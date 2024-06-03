<?php

namespace Modules\Designation\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            "rows"        => $query->paginate(10)->withQueryString(),
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
        if (!$id) {
            abort(404);
        }
        $row = $this->designationRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "departments" => $this->departmentRepository->get(["id", "name"]),
            "page_title"  => __("Designation"),
            "breadcrumbs" => [
                [
                    "name" => __("Designation"),
                    "url"  => route("department.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Designation::admin.detail", $data);

    }

    public function store(DesignationRequest $request, $id = null)
    {
        $dataKeys = [
            "name",
            "description",
            "requirements",
            "responsibilities",
            "salary_from",
            "salary_to",
            "status",
            "department_id"
        ];

        if ($id > 0) {
            $this->hasPermission("designation_update");
            $row = $this->designationRepository->find($id);
            if (!$row) abort(404);
//            $dataKeys[] = "email";
        } else {
            $this->hasPermission("designation_create");
        }

        $attrs = [];

        foreach ($dataKeys as $key) {
            $attrs[$key] = $request->input($key);
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();
            $res = $this->designationRepository->update($attrs, $id);
            if ($res) {
                return redirect()->route("designation.admin.index")
                    ->with("success", __("Designation updated successfully!"));
            }
        } else {
            $attrs["user_create"] = Auth::id();
            $res = $this->designationRepository->create($attrs);
            if ($res) {
                return redirect()->route("designation.admin.index")
                    ->with("success", __("Designation created successfully!"));
            }
        }
        return back()->with("error", __("Failed to create designation!"));
    }

    public function delete($id)
    {
        $this->checkPermission("designation_delete");
        if (!$id) abort(404);
        $res = $this->designationRepository->delete($id);
        if ($res)
            return redirect()->route("designation.admin.index")
                ->with("success", __("Designation deleted successfully!"));
        return back()->with("error", __("Failed to delete designation!"));
    }


}
