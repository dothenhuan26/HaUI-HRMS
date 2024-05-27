<?php

namespace Modules\User\Admin;

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

    public function index()
    {
        return view("User::admin.index");
    }

}
