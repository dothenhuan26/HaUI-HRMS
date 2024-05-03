<?php

namespace Modules\User;

use Modules\ModuleServiceProvider;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Modules\User\Repositories\Eloquent\UserRepository;
use Modules\User\RouteServiceProvider;

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
            UserRepositoryInterface::class,
            UserRepository::class
        );

    }





}
