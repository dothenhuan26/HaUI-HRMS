<?php

namespace Modules\Department\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Admin\AdminController;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\Department\Requests\DepartmentRequest;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;
use Modules\Media\Services\Api\AmazonS3Service;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class DepartmentController extends AdminController
{
    protected $departmentRepository;
    protected $mediaRepository;
    protected $userRepository;
    protected $S3Service;

    public function __construct(DepartmentRepositoryInterface $departmentRepository,
                                MediaRepositoryInterface      $mediaRepository,
                                UserRepositoryInterface       $userRepository,
                                AmazonS3Service               $S3Service)
    {
        $this->departmentRepository = $departmentRepository;
        $this->userRepository = $userRepository;
        $this->mediaRepository = $mediaRepository;
        $this->S3Service = $S3Service;
    }

    public function users(Request $request, $department_id)
    {
        if (!$department_id) abort(404);
        $row = $this->departmentRepository->find($department_id);
        if (!$row) abort(404);
        $data = [
            "users" => $row->users,
        ];
        return $data;
    }


}
