<?php

namespace Modules\Position\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Position\Requests\PositionRequest;
use Modules\Position\Repositories\Contracts\PositionRepositoryInterface;


class PositionController extends AdminController
{
    protected $positionRepository;
    protected $S3Service;

    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function index(Request $request)
    {
        $this->checkPermission("position_view");
        $query = $this->positionRepository->query();
        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        $data = [
            "rows"        => $query->orderBy("updated_at")->paginate(10),
            "page_title"  => __("Position"),
            "breadcrumbs" => [
                [
                    "name" => __("Position"),
                    "url"  => route("position.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Position::admin.index", $data);
    }

    public function create()
    {
        $this->hasPermission("position_create");
        $data = [
            "page_title"  => __("Position"),
            "breadcrumbs" => [
                [
                    "name" => __("Position"),
                    "url"  => route("position.admin.index"),
                ],
                [
                    "name"  => __("Create"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Position::admin.detail", $data);
    }

    public function update(Request $request, $id = null)
    {
        $this->hasPermission("position_create");
        if (!$id) {
            abort(404);
        }
        $row = $this->positionRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "page_title"  => __("Position"),
            "breadcrumbs" => [
                [
                    "name" => __("Position"),
                    "url"  => route("position.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Position::admin.detail", $data);
    }

    public function store(PositionRequest $request, $id = null)
    {
        $dataKeys = [
            "title",
            "position_date",
            "day_of_week",
            "description",
        ];

        if ($id > 0) {
            $this->checkPermission("position_update");
            $row = $this->positionRepository->find($id);
            if (!$row) abort(404);
        } else {
            $this->checkPermission("position_create");
        }

        $attrs = [];

        foreach ($dataKeys as $key) {
            $attrs[$key] = $request->input($key);
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();
            $res = $this->positionRepository->update($attrs, $id);
            if ($res) {
                return redirect()->route("position.admin.index")->with("success", __("Position updated successfully!"));
            }
        } else {
            $attrs["user_create"] = Auth::id();
            $res = $this->positionRepository->create($attrs);
            if ($res) {
                return redirect()->route("position.admin.index")->with("success", __("Position created successfully!"));
            }
        }
        return back()->with("error", __("Failed to create position!"));
    }

    public function delete($id)
    {
        $this->checkPermission("position_delete");
        if (!$id) abort(404);
        $res = $this->positionRepository->delete($id);
        if ($res)
            return redirect()->route("position.admin.index")
                ->with("success", __("Position deleted successfully!"));
        return back()->with("error", __("Failed to delete position!"));
    }


}
