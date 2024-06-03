<?php

namespace Modules\Holiday\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Holiday\Requests\HolidayRequest;
use Modules\Holiday\Repositories\Contracts\HolidayRepositoryInterface;


class HolidayController extends AdminController
{
    protected $holidayRepository;
    protected $S3Service;

    public function __construct(HolidayRepositoryInterface $holidayRepository)
    {
        $this->holidayRepository = $holidayRepository;
    }

    public function index(Request $request)
    {
        $this->checkPermission("holiday_view");
        $query = $this->holidayRepository->query();
        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        $data = [
            "rows"        => $query->orderBy("holiday_date")->paginate(10),
            "page_title"  => __("Holiday"),
            "breadcrumbs" => [
                [
                    "name" => __("Holiday"),
                    "url"  => route("holiday.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Holiday::admin.index", $data);
    }

    public function create()
    {
        $this->hasPermission("holiday_create");
        $data = [
            "page_title"  => __("Holiday"),
            "breadcrumbs" => [
                [
                    "name" => __("Holiday"),
                    "url"  => route("holiday.admin.index"),
                ],
                [
                    "name"  => __("Create"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Holiday::admin.detail", $data);
    }

    public function update(Request $request, $id = null)
    {
        $this->hasPermission("holiday_create");
        if (!$id) {
            abort(404);
        }
        $row = $this->holidayRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "page_title"  => __("Holiday"),
            "breadcrumbs" => [
                [
                    "name" => __("Holiday"),
                    "url"  => route("holiday.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Holiday::admin.detail", $data);
    }

    public function store(HolidayRequest $request, $id = null)
    {
        $dataKeys = [
            "title",
            "holiday_date",
            "day_of_week",
            "description",
        ];

        if ($id > 0) {
            $this->checkPermission("holiday_update");
            $row = $this->holidayRepository->find($id);
            if (!$row) abort(404);
        } else {
            $this->checkPermission("holiday_create");
        }

        $attrs = [];

        foreach ($dataKeys as $key) {
            $attrs[$key] = $request->input($key);
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();
            $res = $this->holidayRepository->update($attrs, $id);
            if ($res) {
                return redirect()->route("holiday.admin.index")->with("success", __("Holiday updated successfully!"));
            }
        } else {
            $attrs["user_create"] = Auth::id();
            $res = $this->holidayRepository->create($attrs);
            if ($res) {
                return redirect()->route("holiday.admin.index")->with("success", __("Holiday created successfully!"));
            }
        }
        return back()->with("error", __("Failed to create holiday!"));
    }

    public function delete($id)
    {
        $this->checkPermission("holiday_delete");
        if (!$id) abort(404);
        $res = $this->holidayRepository->delete($id);
        if ($res)
            return redirect()->route("holiday.admin.index")
                ->with("success", __("Holiday deleted successfully!"));
        return back()->with("error", __("Failed to delete holiday!"));
    }


}
