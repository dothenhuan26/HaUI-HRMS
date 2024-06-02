<?php

namespace Modules\Designation\Admin;

use Illuminate\Http\Request;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\Department\Requests\DepartmentRequest;
use Modules\Designation\Repositories\Contracts\DesignationRepositoryInterface;
use Modules\Designation\Requests\DesignationRequest;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class DesignationController extends AdminController
{
    protected $designationRepository;
    protected $departmentRepository;
    protected $mediaRepository;
    protected $userRepository;
    protected $S3Service;

    public function __construct(DesignationRepositoryInterface $designationRepository,
                                DepartmentRepositoryInterface $departmentRepository,
                                MediaRepositoryInterface $mediaRepository,
                                UserRepositoryInterface $userRepository,
                                AmazonS3Service $S3Service)
    {
        $this->designationRepository = $designationRepository;
        $this->departmentRepository = $departmentRepository;
        $this->mediaRepository = $mediaRepository;
        $this->userRepository = $userRepository;
        $this->S3Service = $S3Service;
    }

    public function index(Request $request)
    {
        $this->checkPermission("designation_view");

        $query = $this->designationRepository->query();

        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        if ($department_id = $request->department_id) $query->where('department_id', '=', $department_id);
        $query = $query->with(["department"]);
        $data = [
            "rows"        => $query->get(),
            "page_title"  => __("Designations"),
            "departments" => $this->departmentRepository->get(["id", "name"]),
            "breadcrumbs" => [
                [
                    "name" => __("Designation"),
                    "url"  => route("designation.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Designation::admin.index", $data);
    }

    public function create()
    {
        $this->checkPermission("designation_create");

        $data = [
            "page_title"  => __("Designation"),
            "departments" => $this->departmentRepository->get(["id", "name"]),
            "breadcrumbs" => [
                [
                    "name" => __("Designation"),
                    "url"  => route("designation.admin.index"),
                ],
                [
                    "name"  => __("Create"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Designation::admin.detail", $data);

    }

    public function update(Request $request, $id = null)
    {
        $this->checkPermission("designation_update");

    }

    public function store(DesignationRequest $request, $id = null)
    {
        dd($request->all());
    }

    public function delete($id)
    {
        $this->checkPermission("designation_delete");
    }


}
