<?php

namespace Modules\Product\Repositories\Eloquent;

use Modules\Product\Model\Product;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseEloquentRepository implements ProductRepositoryInterface
{

    public function model()
    {
        return Product::class;
    }



}
