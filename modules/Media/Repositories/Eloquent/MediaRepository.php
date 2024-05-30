<?php

namespace Modules\Media\Repositories\Eloquent;

use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Media\Models\MediaFile;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;

class MediaRepository extends BaseEloquentRepository implements MediaRepositoryInterface
{

    public function model()
    {
        return MediaFile::class;
    }



}
