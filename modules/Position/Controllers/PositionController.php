<?php

namespace Modules\Position\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\Position\Requests\PositionRequest;
use Modules\Position\Repositories\Contracts\PositionRepositoryInterface;


class PositionController extends Controller
{
    protected $positionRepository;
    protected $departmentRepository;
    protected $S3Service;

    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function index(Request $request)
    {
        $query = $this->positionRepository->query();
        $query->with(["department"]);
        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        $data = [
            "rows"        => $query->orderBy("updated_at", "desc")->paginate(10),
            "page_title"  => __("Available Jobs"),
            "breadcrumbs" => [
                [
                    "name" => __("Jobs"),
                    "url"  => route("job.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Position::frontend.index", $data);
    }

    public function detail(Request $request, $id=null)
    {
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
                    "name" => __("Jobs"),
                    "url"  => route("job.index"),
                ],
                [
                    "name"  => __("Detail"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Position::frontend.detail", $data);
    }

    public function receiveCV(Request $request)
    {
        dd($request->all());
    }

}
