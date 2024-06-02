<?php

namespace Modules\Department\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\Department\Requests\DepartmentRequest;
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
        $this->checkPermission("department_view");
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
        $this->hasPermission("department_create");
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

    public function update(Request $request, $id = null)
    {
        $this->hasPermission("department_create");
        if (!$id) {
            abort(404);
        }
        $row = $this->departmentRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "users"       => $this->userRepository->get(["id", "name"]),
            "page_title"  => __("Department"),
            "breadcrumbs" => [
                [
                    "name" => __("Department"),
                    "url"  => route("department.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Department::admin.detail", $data);
    }

    public function store(DepartmentRequest $request, $id = null)
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
//            $dataKeys[] = "email";
        } else {
            $this->hasPermission("department_create");
        }

        $attrs = [];

        foreach ($dataKeys as $key) {
            $attrs[$key] = $request->input($key);
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();
            $res = $this->departmentRepository->update($attrs, $id);
            if ($res) {
                return redirect()->route("department.admin.index")->with("success", __("Department updated successfully!"));
            }
        } else {
            $attrs["user_create"] = Auth::id();
            $res = $this->departmentRepository->create($attrs);
            if ($res) {
                return redirect()->route("department.admin.index")->with("success", __("Department created successfully!"));
            }
        }
        return back()->with("error", __("Failed to create department!"));
    }

    public function delete($id)
    {
        $this->checkPermission("department_delete");
        if (!$id) abort(404);
        $res = $this->departmentRepository->delete($id);
        if ($res)
            return redirect()->route("department.admin.index")
                ->with("success", __("Department deleted successfully!"));
        return back()->with("error", __("Failed to delete department!"));
    }


}
