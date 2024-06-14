<?php

namespace Modules\User\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Core\Admin\AdminController;
use Modules\Designation\Repositories\Contracts\DesignationRepositoryInterface;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\Payroll\Repositories\Contracts\PayrollRepositoryInterface;
use Modules\User\Models\User;
use Modules\User\Repositories\Contracts\ContractRepositoryInterface;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Modules\User\Requests\UserRequest;

class UserController extends AdminController
{
    protected $userRepository;
    protected $designationRepository;
    protected $contractRepository;
    protected $payrollRepository;
    protected $mediaRepository;
    protected $roleRepository;
    protected $S3Service;

    public function __construct(UserRepositoryInterface        $userRepository,
                                DesignationRepositoryInterface $designationRepository,
                                ContractRepositoryInterface    $contractRepository,
                                PayrollRepositoryInterface     $payrollRepository,
                                MediaRepositoryInterface       $mediaRepository,
                                RoleRepositoryInterface        $roleRepository,
                                AmazonS3Service                $S3Service)
    {
        $this->userRepository = $userRepository;
        $this->designationRepository = $designationRepository;
        $this->contractRepository = $contractRepository;
        $this->payrollRepository = $payrollRepository;
        $this->mediaRepository = $mediaRepository;
        $this->roleRepository = $roleRepository;
        $this->S3Service = $S3Service;
    }

    public function index(Request $request)
    {
        $this->checkPermission("user_view");
        $query = $this->userRepository->query();
        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        if ($code = $request->code) $query->where('code', 'LIKE', "%$code%");
        if ($designation_id = $request->designation_id) $query->where('designation_id', '=', $designation_id);

        $query->exceptSuperAdmin();
        $query->with(["designation", "avatar", "role", "contract"]);
        $data = [
            "rows"         => $query->orderBy("updated_at", "desc")->paginate(12)->withQueryString(),
            "designations" => $this->designationRepository->all(["id", "name"]),
            "has_views"    => true,
            "page_title"   => __("Employee"),
            "layout"       => $request->layout ?? null,
            "breadcrumbs"  => [
                [
                    "name" => __("Employee"),
                    "url"  => route("user.admin.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("User::admin.index", $data);
    }

    public function create()
    {
        $this->checkPermission("user_create");
        $data = [
            "page_title"   => __("Add Employee"),
            "designations" => $this->designationRepository->all(["id", "name"]),
            "roles"        => $this->roleRepository->all(["id", "name"]),
            "breadcrumbs"  => [
                [
                    "name" => __("Employee"),
                    "url"  => route("user.admin.index"),
                ],
                [
                    "name"  => __("Create"),
                    "class" => "active"
                ],
            ]
        ];
        return view("User::admin.detail", $data);
    }

    public function update(Request $request, $id = null)
    {
        $this->checkPermission("user_update");
        $this->hasPermission("user_create");
        if (!$id) {
            abort(404);
        }
        $row = $this->userRepository->find($id);
        $data = [
            "row"          => $row,
            "page_title"   => __("Add Employee"),
            "designations" => $this->designationRepository->all(["id", "name"]),
            "roles"        => $this->roleRepository->all(["id", "name"]),
            "breadcrumbs"  => [
                [
                    "name" => __("Employee"),
                    "url"  => route("user.admin.index"),
                ],
                [
                    "name"  => __("Update"),
                    "class" => "active"
                ],
            ]
        ];
        return view("User::admin.detail", $data);
    }

    public function store(UserRequest $request, $id = null)
    {
        if ($id > 0) {
            $this->checkPermission("user_update");
            $row = $this->userRepository->find($id);
            if (!$row) abort(404);
        } else {
            $this->checkPermission("user_create");
        }

        $dataKeys = [
            "first_name",
            "last_name",
            "name",
            "birthday",
            "gender",
            "id_card",
            "phone",
            "code",
            "passport",
            "passport_exp",
            "religion",
            "address",
            "country",
            "national",
            "designation_id",
            'is_active',
            "educations",
            "experiences",
            'role_id',
        ];

        if (!($id > 0)) {
            $dataKeys[] = "password";
            $dataKeys[] = "email";
        }

        $attrs = [];
        $data = $request->except(["educations.__index__", "experiences.__index__"]);
        foreach ($dataKeys as $key) {
            $attrs[$key] = $data[$key];
        }

        if ($request->avatar) {
            $avatar = $this->uploadToS3($request->avatar);
            if ($avatar) {
                $attrs['avatar_id'] = $avatar->id;
            }
        }

        if ($id) {
            $attrs["user_update"] = Auth::id();
            $res = $this->userRepository->update($attrs, $id);
            if ($res) {
                return redirect()->route("user.admin.index")->with("success", __("User updated successfully!"));
            }
        } else {
            $attrs["user_create"] = Auth::id();
            $res = $this->userRepository->create($attrs);
            if ($res) {
                if ($res->id) {
                    $this->payrollRepository->create(["user_id" => $res->id]);
                }
                return redirect()->route("user.admin.index")->with("success", __("User created successfully!"));
            }
        }
        return back()->with("error", __("Failed to create user!"));

    }

    public function uploadToS3($file)
    {
        if (!$file) return back()->with("error", __("File Doesn't Exist!"));
        $data = $this->S3Service->uploadImageToS3("images", $file, "avatars");
        if ($data["status"]) {
            $res = $this->mediaRepository->create([
                "file_name"      => $data["file_name"] ?? "",
                "file_path"      => $data["file_path"] ?? "",
                "url"            => $data["url"] ?? "",
                "file_size"      => $file->getSize(),
                "driver"         => "S3",
                "file_type"      => $file->getType(),
                "file_extension" => $file->getClientOriginalExtension(),
            ]);
            return $res;
        }
        return back()->with("error", __("Failed to Upload File to S3!"));
    }

    public function delete($id)
    {
        $this->checkPermission("user_delete");
        if (!$id) abort(404);
        $res = $this->userRepository->delete($id);
        if ($res)
            return redirect()->route("user.admin.index")
                ->with("success", __("User deleted successfully!"));
        return back()
            ->with("error", __("Failed to delete user!"));
    }

    public function contract(Request $request, $id)
    {
        $this->checkPermission("contract_update");
        if (!$id) abort(404);
        $row = $this->contractRepository->find($id);
        if (!$row) abort(404);
        $data = [
            "row"         => $row,
            "page_title"  => __("Contract"),
            "breadcrumbs" => [
                [
                    "name" => __("Employee"),
                    "url"  => route("user.admin.index"),
                ],
                [
                    "name"  => __("Contract"),
                    "class" => "active"
                ],
            ]
        ];

        return view("User::admin.contract", $data);
    }

    public function updateContract(Request $request, $id)
    {
        $this->checkPermission("update_contract");
        if (!$id) abort(404);
        $dataKeys = [
            "content",
        ];
        $attrs = [];
        foreach ($dataKeys as $key) {
            if ($key === "content") {
                $attrs[$key] = encrypt($request->$key);
                continue;
            }
            $attrs[$key] = $request->$key;
        }

        $res = $this->contractRepository->update($attrs, $id);
        if ($res)
            return redirect()->route("user.admin.index")->with("success", __("User's contract updated successfully!"));
        return back()->with("error", __("Failed to create user!"));
    }


}
