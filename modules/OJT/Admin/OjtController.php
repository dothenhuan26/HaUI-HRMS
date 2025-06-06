<?php

namespace Modules\OJT\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\OJT\Repositories\Contracts\OJTRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;


class OjtController extends AdminController
{
    protected $ojtRepository;
    protected $userRepository;
    protected $departmentRepository;

    public function __construct(OJTRepositoryInterface        $ojtRepository,
                                UserRepositoryInterface       $userRepository,
                                DepartmentRepositoryInterface $departmentRepository)
    {
        $this->ojtRepository = $ojtRepository;
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function index(Request $request)
    {
        $this->checkPermission("ojt_view");

        $query = $this->ojtRepository->query();

        if ($name = $request->name) $query->where('title', 'LIKE', "%$name%");
        $data = [
            "rows"        => $query->orderBy("created_at", "desc")->paginate(10)->withQueryString(),
            "users"       => $this->userRepository->all(),
            "departments" => $this->departmentRepository->all(),
            "page_title"  => __("On Job Training"),
            "breadcrumbs" => [
                [
                    "name" => __("On Job Training"),
                    "url"  => route("ojt.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("OJT::admin.index", $data);
    }

    public function create()
    {
        $this->checkPermission("ojt_create");

        $data = [
            "page_title"  => __("OJT"),
            "departments" => $this->departmentRepository->all(),
            "breadcrumbs" => [
                [
                    "name" => __("OJT"),
                    "url"  => route("ojt.admin.index"),
                ],
                [
                    "name"  => __("Create"),
                    "class" => "active"
                ],
            ]
        ];

        return view("OJT::admin.detail", $data);

    }

    public function update(Request $request, $id = null)
    {
        $this->checkPermission("ojt_update");
        if (!$id) {
            abort(404);
        }
        $row = $this->ojtRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "page_title"  => __("OJT"),
            "departments" => $this->departmentRepository->all(),
            "breadcrumbs" => [
                [
                    "name" => __("OJT"),
                    "url"  => route("ojt.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("OJT::admin.detail", $data);
    }

    public function store(Request $request, $id = null)
    {
        $dataKeys = [
            "title",
            "description",
            "stages",
        ];

        if ($id > 0) {
            $this->hasPermission("ojt_update");
            $row = $this->ojtRepository->find($id);
            if (!$row) abort(404);
        } else {
            $this->hasPermission("ojt_create");
        }

        $attrs = [];
        $data = $request->except(["stages.__index__"]);
        foreach ($dataKeys as $key) {
            $attrs[$key] = $data[$key];
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();
            $res = $this->ojtRepository->update($attrs, $id);
            if ($res) {
                if ($request->user_ids) {
                    $this->ojtRepository->syncOjtForUser($request->user_ids, $id);
                }
                return redirect()->route("ojt.admin.index")
                    ->with("success", __("OJT updated successfully!"));
            }
        } else {
            $attrs["user_create"] = Auth::id();
            $res = $this->ojtRepository->create($attrs);
            if ($res) {
                if ($request->user_ids) {
                    $this->ojtRepository->syncOjtForUser($request->user_ids, $res->id);
                }
                return redirect()->route("ojt.admin.index")
                    ->with("success", __("OJT created successfully!"));
            }
        }
        return back()->with("error", __("Failed to create ojt!"));
    }

    public function delete($id)
    {
        $this->checkPermission("ojt_delete");
        if (!$id) abort(404);
        $res = $this->ojtRepository->delete($id);
        if ($res)
            return redirect()->route("ojt.admin.index")
                ->with("success", __("OJT deleted successfully!"));
        return back()->with("error", __("Failed to delete ojt!"));
    }


}
