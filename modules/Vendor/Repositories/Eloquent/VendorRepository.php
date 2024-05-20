<?php

namespace Modules\Vendor\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Vendor\Repositories\Contracts\VendorRepositoryInterface;

class VendorRepository extends BaseEloquentRepository implements VendorRepositoryInterface
{

    public function model()
    {
        return Vendor::class;
    }



}
