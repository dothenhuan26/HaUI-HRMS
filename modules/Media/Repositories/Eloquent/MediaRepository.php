<?php

namespace Modules\Media\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;

class MediaRepository extends BaseEloquentRepository implements MediaRepositoryInterface
{

    public function model()
    {
        return Media::class;
    }



}
