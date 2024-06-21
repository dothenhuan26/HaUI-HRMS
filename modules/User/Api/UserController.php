<?php

namespace Modules\User\Api;

use Illuminate\Http\Request;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;


class UserController extends AdminController
{
    protected $userRepository;
    protected $departmentRepository;

    public function __construct(UserRepositoryInterface       $userRepository,
                                DepartmentRepositoryInterface $departmentRepository)
    {
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function index(Request $request)
    {
        $query = $this->userRepository->query();
        $query->exceptSuperAdmin();
//        $query->with(["avatar", "role"]);
        $data = [
            "users" => $query->orderBy("updated_at", "desc")->get(["id","name", "email"]),
        ];

        return $data;
    }

}
