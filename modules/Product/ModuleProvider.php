<?php

namespace Modules\Product;

use Modules\ModuleServiceProvider;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Repositories\Eloquent\ProductRepository;
use Modules\Product\RouteServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

    }





}
