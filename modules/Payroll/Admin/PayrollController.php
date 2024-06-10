<?php

namespace Modules\Payroll\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Payroll\Repositories\Contracts\PayrollRepositoryInterface;
use Modules\Payroll\Requests\PayrollRequest;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class PayrollController extends AdminController
{
    protected $payrollRepository;
    protected $userRepository;
    protected $roleRepository;
    protected $S3Service;

    public function __construct(PayrollRepositoryInterface $payrollRepository,
                                UserRepositoryInterface    $userRepository,
                                RoleRepositoryInterface    $roleRepository,
                                AmazonS3Service            $S3Service)
    {
        $this->payrollRepository = $payrollRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->S3Service = $S3Service;
    }

    public function index(Request $request)
    {
        $this->checkPermission("payroll_view");
        $query = $this->userRepository->query();

        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        if ($role_id = $request->role_id) $query->where('role_id', $role_id);
        if ($from = $request->from) $query->where("created_at", ">=", date('Y-m-d', strtotime($from)));
        if ($to = $request->to) $query->where("created_at", "<=", date('Y-m-d', strtotime($to)));
        $query->with(["payroll", "role", "designation"]);

        $data = [
            "rows"        => $query->orderBy("updated_at", "desc")->paginate(10)->withQueryString(),
            "roles"       => $this->roleRepository->all(),
            "page_title"  => __("Employee Salary"),
            "breadcrumbs" => [
                [
                    "name" => __("Payroll"),
                    "url"  => route("payroll.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("Payroll::admin.index", $data);
    }

    public function update(Request $request, $id = null)
    {
        $this->hasPermission("payroll_update");
        if (!$id) {
            abort(404);
        }
        $row = $this->payrollRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "users"       => $this->userRepository->get(["id", "name"]),
            "page_title"  => __("Payroll"),
            "breadcrumbs" => [
                [
                    "name" => __("Payroll"),
                    "url"  => route("payroll.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("Payroll::admin.detail", $data);
    }

    public function store(PayrollRequest $request, $id = null)
    {
        $dataKeys = [
            "bank_name",
            "bank_number",
            "salary_basis",
            "payment_type",
            "gratuity",
            "salary_gross",
            "overtime",
            "deduction",
            "unpaid_leave",
            "advance",
            "absent_amount",
            "allowance",
            "loan",
            "insurance",
            "others",
        ];

        if ($id > 0) {
            $this->hasPermission("payroll_update");
            $row = $this->payrollRepository->find($id);
            if (!$row) abort(404);
        }

        $attrs = [];

        foreach ($dataKeys as $key) {
            $attrs[$key] = $request->input($key);
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();

            $attrs["salary_net"] = $attrs["salary_gross"] - $attrs["insurance"];

            $attrs["salary"] = $attrs["salary_net"] + $attrs["gratuity"] +
                $attrs["overtime"] - $attrs["unpaid_leave"] * $attrs["absent_amount"] +
                $attrs["allowance"] - $attrs["others"] + $attrs["advance"];

            $res = $this->payrollRepository->update($attrs, $id);

            if ($res) {
                return redirect()->route("payroll.admin.index")->with("success", __("Payroll updated successfully!"));
            }
        }
        return back()->with("error", __("Failed to create payroll!"));
    }

}
