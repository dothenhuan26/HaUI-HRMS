<?php

namespace Modules\Vendor;

use Modules\ModuleServiceProvider;
use Modules\Vendor\Repositories\Contracts\VendorRepositoryInterface;
use Modules\Vendor\Repositories\Eloquent\VendorRepository;
use Modules\Vendor\RouteServiceProvider;

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
            VendorRepositoryInterface::class,
            VendorRepository::class
        );

    }





}
