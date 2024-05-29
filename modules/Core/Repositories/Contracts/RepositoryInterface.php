<?php

namespace Modules\Core\Repositories\Contracts;

interface RepositoryInterface
{
    public function get($columns = ['*']);

    public function query();

    public function find($id, $columns = ['*']);

    public function all($columns = ['*']);

    public function count(array $where = [], $columns = '*');

    public function paginate($limit = null, $columns = ['*']);

    public function pluck($column, $key = null);

    public function simplePaginate($limit = null, $columns = ['*']);

    public function findByField($field, $value, $columns = ['*']);

    public function where(...$where);

    public function findWhere(array $where, $columns = ['*']);

    public function findWhereIn($field, array $values, $columns = ['*']);

    public function findWhereBetween($field, $values, $columns = ['*']);

    public function create(array $attributes = []);

    public function update(array $attributes, $id);

    public function updateOrCreate(array $attributes, array $values = []);

    public function delete($id);

    public function deleteWhere(array $where);

    public function orderBy($column, $direction = 'asc');

    public function with($relations);

    public function take($limit);

    public function limit($limit, $columns = ['*']);

    public function whereHas($relation, $closure);

    public function withCount($relations);

    public function first($columns = ['*']);

    public function firstOrNew(array $attributes = []);

    public function firstOrCreate(array $attributes = []);


}

