<?php

namespace Modules\User\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Designation\Repositories\Contracts\DesignationRepositoryInterface;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\User\Models\User;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;
    protected $designationRepository;
    protected $mediaRepository;
    protected $S3Service;

    public function __construct(UserRepositoryInterface $userRepository,
                                DesignationRepositoryInterface $designationRepository,
                                MediaRepositoryInterface $mediaRepository,
                                AmazonS3Service $S3Service)
    {
        $this->userRepository = $userRepository;
        $this->designationRepository = $designationRepository;
        $this->mediaRepository = $mediaRepository;
        $this->S3Service = $S3Service;
    }

    public function index(Request $request)
    {
        $query = $this->userRepository->query();

        if ($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        if ($code = $request->code) $query->where('code', 'LIKE', "%$code%");
        if ($designation_id = $request->designation_id) $query->where('designation_id', '=', $designation_id);

        $query->exceptSuperAdmin();
        if ($request->layout) $rows = $query->paginate(12)->withQueryString();
        else $rows = $query->get();
        $query->with(["designation", "avatar"]);
        $data = [
            "rows"         => $rows,
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

    public function create() {
        $data = [
            'row' => $this->userRepository->find(5),
            "page_title" => __("Add Employee"),
            "designations" => $this->designationRepository->all(["id", "name"]),
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

    public function store()
    {

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

}
