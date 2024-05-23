<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Media\Services\Api\AmazonS3Service;

class S3Controller extends Controller
{
    //
    protected $amazonS3Service;

    public function index() {
        return view("demo-upload");
    }

    public function __construct(AmazonS3Service $amazonS3Service)
    {
        $this->amazonS3Service = $amazonS3Service;
    }


    public function uploadImageToS3(Request $request)
    {
        $name = Auth::user()->name;
        $response = $this->amazonS3Service->uploadImageToS3($request, $name);
        return $response;
    }

    public function deleteImageFromS3(Request $request)
    {
        $response = $this->amazonS3Service->deleteImageFromS3($request);
        return $response;
    }

    public function delete() {
        return view('demo-delete');
    }

}
