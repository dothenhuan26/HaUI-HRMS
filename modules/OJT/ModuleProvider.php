<?php

namespace Modules\OJT;

use Modules\ModuleServiceProvider;
use Modules\OJT\Repositories\Contracts\OJTRepositoryInterface;
use Modules\OJT\Repositories\Eloquent\OJTRepository;
use Modules\OJT\RouteServiceProvider;

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
            OJTRepositoryInterface::class,
            OJTRepository::class
        );

    }





}
