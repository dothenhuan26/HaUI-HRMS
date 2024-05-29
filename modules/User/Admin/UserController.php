<?php

namespace Modules\User\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Designation\Repositories\Contracts\DesignationRepositoryInterface;
use Modules\User\Models\User;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;
    protected $designationRepository;

    public function __construct(UserRepositoryInterface $userRepository, DesignationRepositoryInterface $designationRepository)
    {
        $this->userRepository = $userRepository;
        $this->designationRepository = $designationRepository;
    }

    public function index(Request $request)
    {
        $query = $this->userRepository->query();

        if($name = $request->name) $query->where('name', 'LIKE', "%$name%");
        if($code = $request->code) $query->where('code', 'LIKE', "%$code%");
        if($designation_id = $request->designation_id) $query->where('designation_id', '=', $designation_id);

        $query->exceptSuperAdmin();

        $query->with("designation");
        $data = [
            "rows"         => $query->paginate(12)->withQueryString(),
            "designations" => $this->designationRepository->all(["id", "name"]),
            "has_views"    => true,
            "page_title"   => __("Employee"),
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


}
