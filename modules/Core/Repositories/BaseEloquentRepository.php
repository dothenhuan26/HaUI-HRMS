<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Modules\Core\Repositories\Contracts\RepositoryInterface;

abstract class BaseEloquentRepository implements RepositoryInterface
{
    protected $app;

    protected $model;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    public function resetModel()
    {
        $this->makeModel();
    }

    abstract public function model();

    protected function handleWhere(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                //smooth input
                $condition = preg_replace('/\s\s+/', ' ', trim($condition));

                //split to get operator, syntax: "DATE >", "DATE =", "DAY <"
                $operator = explode(' ', $condition);
                if (count($operator) > 1) {
                    $condition = $operator[0];
                    $operator = $operator[1];
                } else $operator = null;
                switch (strtoupper($condition)) {
                    case 'IN':
                        if (!is_array($val)) throw new \Exception("Input {$val} mus be an array");
                        $this->model = $this->model->whereIn($field, $val);
                        break;
                    case 'NOTIN':
                        if (!is_array($val)) throw new \Exception("Input {$val} mus be an array");
                        $this->model = $this->model->whereNotIn($field, $val);
                        break;
                    case 'DATE':
                        if (!$operator) $operator = '=';
                        $this->model = $this->model->whereDate($field, $operator, $val);
                        break;
                    case 'DAY':
                        if (!$operator) $operator = '=';
                        $this->model = $this->model->whereDay($field, $operator, $val);
                        break;
                    case 'MONTH':
                        if (!$operator) $operator = '=';
                        $this->model = $this->model->whereMonth($field, $operator, $val);
                        break;
                    case 'YEAR':
                        if (!$operator) $operator = '=';
                        $this->model = $this->model->whereYear($field, $operator, $val);
                        break;
                    case 'EXISTS':
                        if (!($val instanceof Closure)) throw new \Exception("Input {$val} must be closure function");
                        $this->model = $this->model->whereExists($val);
                        break;
                    case 'HAS':
                        if (!($val instanceof Closure)) throw new \Exception("Input {$val} must be closure function");
                        $this->model = $this->model->whereHas($field, $val);
                        break;
                    case 'HASMORPH':
                        if (!($val instanceof Closure)) throw new \Exception("Input {$val} must be closure function");
                        $this->model = $this->model->whereHasMorph($field, $val);
                        break;
                    case 'DOESNTHAVE':
                        if (!($val instanceof Closure)) throw new \Exception("Input {$val} must be closure function");
                        $this->model = $this->model->whereDoesntHave($field, $val);
                        break;
                    case 'DOESNTHAVEMORPH':
                        if (!($val instanceof Closure)) throw new \Exception("Input {$val} must be closure function");
                        $this->model = $this->model->whereDoesntHaveMorph($field, $val);
                        break;
                    case 'BETWEEN':
                        if (!is_array($val)) throw new \Exception("Input {$val} mus be an array");
                        $this->model = $this->model->whereBetween($field, $val);
                        break;
                    case 'BETWEENCOLUMNS':
                        if (!is_array($val)) throw new \Exception("Input {$val} mus be an array");
                        $this->model = $this->model->whereBetweenColumns($field, $val);
                        break;
                    case 'NOTBETWEEN':
                        if (!is_array($val)) throw new \Exception("Input {$val} mus be an array");
                        $this->model = $this->model->whereNotBetween($field, $val);
                        break;
                    case 'NOTBETWEENCOLUMNS':
                        if (!is_array($val)) throw new RepositoryException("Input {$val} mus be an array");
                        $this->model = $this->model->whereNotBetweenColumns($field, $val);
                        break;
                    case 'RAW':
                        $this->model = $this->model->whereRaw($val);
                        break;
                    default:
                        $this->model = $this->model->where($field, $condition, $val);
                }
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }

    public function get()
    {
        $result = $this->model->get();
        $this->resetModel();
        return $result;
    }

    public function first($columns = ['*'])
    {
        $model = $this->model->first($columns);
        $this->resetModel();
        return $model;
    }

    public function find($id, $columns = ['*'])
    {
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();
        return $model;
    }

    public function all($columns = ['*'])
    {
        $result = $this->model->all($columns);
        $this->resetModel();
        return $result;
    }

    public function count(array $where = [], $columns = '*')
    {
        if ($where) {
            $this->handleWhere($where);
        }
        $result = $this->model->count($columns);
        $this->resetModel();
        return $result;
    }

    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 20) : $limit;
        $result = $this->model->{$method}($limit, $columns)->appends(app('request')->query());
        $this->resetModel();
        return $result;
    }

    public function pluck($column, $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    public function simplePaginate($limit = null, $columns = ['*'])
    {
        return $this->paginate($limit, $columns, "simplePaginate");
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        $model = $this->model->where($field, '=', $value)->get($columns);
        $this->resetModel();
        return $model;
    }

    public function where(...$where)
    {
        $this->model = $this->model->where(...$where);
        return $this;
    }

    public function findWhere(array $where, $columns = ['*'])
    {
        $this->handleWhere($where);
        $model = $this->model->get($columns);
        $this->resetModel();
        return $model;
    }

    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        $model = $this->model->whereIn($field, $values)->get($columns);
        $this->resetModel();
        return $model;
    }

    public function findWhereBetween($field, $values, $columns = ['*'])
    {
        $model = $this->model->whereBetween($field, $values)->get($columns);
        $this->resetModel();
        return $model;
    }

    public function create(array $attributes = [])
    {
        $result = $this->model->create($attributes);
        return $result;
    }

    public function update(array $attributes, $id)
    {
        $model = $this->find($id);
        $result = $model->update($attributes);
        $this->resetModel();
        return $result;
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        $model = $this->model->updateOrCreate($attributes, $values);
        $this->resetModel();
        return $model;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        $result = $model->delete();
        $this->resetModel();
        return $result;
    }

    public function deleteWhere(array $where)
    {
        $this->handleWhere($where);
        $result = $this->model->delete();
        $this->resetModel();
        return $result;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->model = $this->model->orderBy($column, $direction);
        return $this;
    }

    public function take($limit)
    {
        $this->model = $this->model->limit($limit);
        return $this;
    }

    public function with($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    public function whereHas($relation, $closure)
    {
        $this->model = $this->model->whereHas($relation, $closure);
        return $this;
    }

    public function withCount($relations)
    {
        $this->model = $this->model->withCount($relations);
        return $this;
    }

    public function firstOrNew(array $attributes = [])
    {
        $model = $this->model->firstOrNew($attributes);
        $this->resetModel();
        return $model;
    }

    public function firstOrCreate(array $attributes = [])
    {
        $model = $this->model->firstOrCreate($attributes);
        $this->resetModel();
        return $model;
    }

    public function limit($limit, $columns = ['*'])
    {
        $this->take($limit);
        return $this->all($columns);
    }

}
