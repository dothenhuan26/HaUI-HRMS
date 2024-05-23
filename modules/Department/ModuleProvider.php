<?php

namespace Modules\Department;

use Modules\ModuleServiceProvider;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;
use Modules\Department\Repositories\Eloquent\DepartmentRepository;
use Modules\Department\RouteServiceProvider;

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
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class
        );

    }





}
