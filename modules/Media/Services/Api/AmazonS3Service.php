<?php

namespace Modules\Media\Services\Api;

use Illuminate\Http\Request;
use Modules\Media\Services\Service;

class AmazonS3Service extends Service
{
    public function uploadImageToS3(Request $request, $dir = "")
    {
        $data = $this->multipartUploaderToS3('images', $request->file('file'), $dir);
        return $data;
    }

    public function deleteImageFromS3(Request $request)
    {
        $data = $this->deleteObjectS3($request->file_path);
        return $data;
    }
}
