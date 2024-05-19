<?php

namespace App\Traits;

use Aws\Exception\AwsException;
use Aws\Exception\MultipartUploadException;
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileUpload
{

    public function upLoadObjectToS3(string $folder, UploadedFile $object, string $dir): array
    {
        $initial = [
            'status' => false,
            'fileName' => '',
            'filePath' => '',
            'url' => '',
        ];
        if ($object) {
            $fileName = $this->getFileName($object);
            $filePath = "{$folder}/{$dir}/{$fileName}";
            Storage::disk('s3')->put($filePath, file_get_contents($object), 's3');
            $initial = [
                'status' => true,
                'fileName' => $fileName,
                'filePath' => $filePath,
                'url' => $this->getObjectUrlFromS3($filePath),
            ];
        }
        return $initial;
    }

    public function multipartUploaderToS3(string $folder, UploadedFile $object, string $dir)
    {
        $initial = [
            'status' => false,
            'fileName' => '',
            'filePath' => '',
            'url' => '',
        ];
        if ($object) {
            $fileName = $this->getFileName($object);
            $filePath = "{$folder}/{$dir}/{$fileName}";
            $contents = fopen($object, 'rb');

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => env('AWS_DEFAULT_REGION')
            ]);

            // Use MultipartUploader to upload files to S3
            $uploader = new MultipartUploader($s3, $contents, [
                'bucket' => env('AWS_BUCKET'),
                'key' => $filePath,
            ]);

            try {
                $result = $uploader->upload();
                $initial = [
                    'status' => true,
                    'fileName' => $fileName,
                    'filePath' => $filePath,
                    'url' => $result['ObjectURL'],
                ];
                return $initial;
            } catch (MultipartUploadException $e) {
                $initial['message'] = 'Failed to upload file!';
            } catch (AwsException $e) {
                $initial['message'] = 'AWS error: ' . $e->getMessage();
            }
        }

        return $initial;
    }

    public function getObjectUrlFromS3($filePath)
    {
        $initial = [
            'status' => true,
        ];
        if (empty($filePath)) {
            return null;
        }
        if (count($filePath) == 1) $filePath = implode($filePath);
        if (is_array($filePath)) {
            $arrPathExist = [];
            foreach ($filePath as $item) {
                if (Storage::disk('s3')->exists($item)) {
                    $arrPathExist[] = Storage::disk('s3')->url($item);
                }
            }

            if (!empty($arrPathExist)) {
                $initial['urls'] = $arrPathExist;
                return $initial;
            }
        }
        if (is_string($filePath) && Storage::disk('s3')->exists($filePath)) {
            $url = Storage::disk('s3')->url($filePath);
            $initial['url'] = $url;
            return $initial;
        }
    }

    public function deleteObjectS3($filePath): array
    {
        $initial = [
            'status' => false,
        ];
        if (empty($filePath)) {
            return $initial;
        }
        if (count($filePath) == 1) $filePath = implode($filePath);
        if (is_array($filePath)) {
            $arrPathExist = [];
            foreach ($filePath as $item) {
                if (Storage::disk('s3')->exists($item)) {
                    $arrPathExist[] = $item;
                }
            }
            if (!empty($arrPathExist)) {
                $data = Storage::disk('s3')->delete($arrPathExist);
                $initial['status'] = $data;
            }
        }
        if (is_string($filePath) && (Storage::disk('s3')->exists($filePath))) {
            $data = Storage::disk('s3')->delete($filePath);
            $initial['status'] = $data;
        }

        return $initial;
    }

    private function getFileName(UploadedFile $object): string
    {
        $originName = $object->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $object->getClientOriginalExtension();
        $fileName = "{$fileName}_" . time() . "_{$extension}";
        return $fileName;
    }


}

