<?php

namespace Modules\Payroll\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Payroll\Repositories\Contracts\PayrollRepositoryInterface;
use Modules\Payroll\Repositories\Contracts\SalaryRankRepositoryInterface;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class SalaryRankController extends AdminController
{
    protected $salaryRankRepository;
    protected $rankRepository;
    protected $userRepository;
    protected $roleRepository;
    protected $S3Service;

    public function __construct(SalaryRankRepositoryInterface $salaryRankRepository,
                                PayrollRepositoryInterface    $rankRepository,
                                UserRepositoryInterface       $userRepository,
                                RoleRepositoryInterface       $roleRepository,
                                AmazonS3Service               $S3Service)
    {
        $this->salaryRankRepository = $salaryRankRepository;
        $this->rankRepository = $rankRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->S3Service = $S3Service;
    }

    public function index(Request $request)
    {
//        $this->checkPermission("rank_view");
        $query = $this->salaryRankRepository->query();
        $query->with([]);

        $data = [
            "rows"        => $query->orderBy("updated_at", "desc")->paginate(10)->withQueryString(),
            "page_title"  => __("Salary Rank"),
            "breadcrumbs" => [
                [
                    "name" => __("Salary Rank"),
                    "url"  => route("rank.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Payroll::admin.rank.index", $data);
    }

    public function detail(Request $request)
    {
//        $this->hasPermission("rank_update");
        $query = $this->salaryRankRepository->query();
        $query->with([]);
        $data = [
            "rows"        => $query->orderBy("updated_at", "desc")->get(),
            "page_title"  => __("Salary Rank"),
            "breadcrumbs" => [
                [
                    "name" => __("Salary Rank"),
                    "url"  => route("rank.admin.index"),
                ],
                [
                    "name"  => __("Detail"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Payroll::admin.rank.detail", $data);
    }

    public function store(Request $request, $id = null)
    {
        $data = $request->except(["rows.__index__"]);

        $dataKeys = [
            "rank",
            "coefficient",
            "from",
            "description"
        ];

        $attrs = [];
        $this->salaryRankRepository->truncate();
        foreach ($data["rows"] as $row) {
            $attrs = [];
            foreach ($dataKeys as $key) {
                $attrs[$key] = $row[$key];
            }
            $this->salaryRankRepository->create($attrs);
        }
        return redirect()->route("rank.admin.index")->with("success", __("Salary rank updated successfully!"));
//        return back()->with("error", __("Failed to create rank!"));
    }

}
