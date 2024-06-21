<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile(Request $request, $code = null)
    {
        if (!$code) abort(404);
        $row = $this->userRepository->findByField("code", $code)->first();
        if(!$row) abort(404);
        $data = [
            "row"          => $row,
            "page_title"   => __("Profile"),
            "breadcrumbs"  => [
                [
                    "name" => __("Employee"),
                    "url"  => route("user.admin.index"),
                ],
                [
                    "name"  => __("Profile"),
                    "class" => "active"
                ],
            ]
        ];

        return view("User::frontend.profile", $data);

    }

}
