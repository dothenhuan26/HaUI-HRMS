<?php

namespace Modules\Media\Services\Api;

use Illuminate\Http\Request;
use Modules\Media\Services\Service;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AmazonS3Service extends Service
{
    public function uploadImageToS3(string $folder, UploadedFile $file, string $dir)
    {
        $data = $this->multipartUploaderToS3($folder, $file, $dir);
        return $data;
    }

    public function deleteImageFromS3($filePath)
    {
        $data = $this->deleteObjectS3($filePath);
        return $data;
    }

    public function getImageFromS3($filePath) {
        $data = $this->getObjectUrlFromS3($filePath);
        return $data;
    }
}
