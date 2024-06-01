<?php

namespace Modules\Department\Admin;

use Illuminate\Http\Request;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class DepartmentController extends AdminController
{
    protected $departmentRepository;
    protected $mediaRepository;
    protected $userRepository;
    protected $S3Service;

    public function __construct(DepartmentRepositoryInterface $departmentRepository,
                                MediaRepositoryInterface $mediaRepository,
                                UserRepositoryInterface $userRepository,
                                AmazonS3Service $S3Service)
    {
        $this->departmentRepository = $departmentRepository;
        $this->userRepository = $userRepository;
        $this->mediaRepository = $mediaRepository;
        $this->S3Service = $S3Service;
    }

    public function index(Request $request)
    {
        $query = $this->departmentRepository->query();

        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");

        $data = [
            "rows"        => $query->get(),
            "page_title"  => __("Department"),
            "breadcrumbs" => [
                [
                    "name" => __("Department"),
                    "url"  => route("department.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Department::admin.index", $data);
    }

    public function create()
    {

        $data = [
            "users"       => $this->userRepository->get(["id", "name"]),
            "page_title"  => __("Department"),
            "breadcrumbs" => [
                [
                    "name" => __("Department"),
                    "url"  => route("department.admin.index"),
                ],
                [
                    "name"  => __("Create"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Department::admin.detail", $data);
    }

    public function store(Request $request, $id = null)
    {
        $dataKeys = [
            "name",
            "description",
            "manager_id",
            "location",
            "budget",
            "status",
            "phone",
            "email",
        ];

        if ($id > 0) {
            $this->hasPermission("department_update");
            $row = $this->departmentRepository->find($id);
            if (!$row) abort(404);
        } else {
            $this->hasPermission("department_create");
        }

        $attr = [];

        foreach ($dataKeys as $key) {
            $attr[$key] = $request->input($key);
        }

    }


}
