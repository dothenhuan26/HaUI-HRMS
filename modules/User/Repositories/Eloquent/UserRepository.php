<?php

namespace Modules\User\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use Modules\User\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Modules\Department\Models\Department;

class UserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{

    public function model()
    {
        return User::class;
    }

    public function exceptRole($role)
    {

    }

    public function exceptRoles($roles = [])
    {

    }

    public function exceptSuperAdmin()
    {
        $this->model = $this->model->where('id', '!=', Auth::id());
        return $this;
    }

    public function create(array $attributes = [])
    {
        if (!$attributes['name']) $attributes['name'] = $attributes["first_name"] . ' ' . $attributes["last_name"];
        $code = $this->count();
        $code++;
        $len = 8 - strlen((string)$code);
        foreach (range(1, $len) as $i) $code = '0' . $code;
        $attributes['code'] = $code;
        $result = $this->model->create($attributes);
        $this->resetModel();
        return $result;
    }

    public function update(array $attributes, $id)
    {
        if (!$attributes['name']) $attributes['name'] = $attributes["first_name"] . ' ' . $attributes["last_name"];
        $model = $this->find($id);
        $result = $model->update($attributes);
        $this->resetModel();
        return $result;
    }

    public function usersOfDepartment($department_id)
    {
        $department = Department::find($department_id);
        if (!$department) abort(404);
        return $department->users;
    }


}
