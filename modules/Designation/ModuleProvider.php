<?php

namespace Modules\Designation;

use Modules\ModuleServiceProvider;
use Modules\Designation\Repositories\Contracts\DesignationRepositoryInterface;
use Modules\Designation\Repositories\Eloquent\DesignationRepository;
use Modules\Designation\RouteServiceProvider;

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
            DesignationRepositoryInterface::class,
            DesignationRepository::class
        );

    }





}
