<?php

namespace Modules\Auth;

use Modules\ModuleServiceProvider;
use Modules\Auth\Repositories\Contracts\AuthRepositoryInterface;
use Modules\Auth\Repositories\Eloquent\AuthRepository;

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
            AuthRepositoryInterface::class,
            AuthRepository::class
        );

    }





}
