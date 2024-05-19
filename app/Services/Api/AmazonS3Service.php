<?php

namespace App\Services\Api;

use App\Services\BaseService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class AmazonS3Service extends BaseService
{
    use FileUpload;

}
