<?php

namespace Modules\User;

use Modules\ModuleServiceProvider;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Modules\User\Repositories\Eloquent\RoleRepository;
use Modules\User\Repositories\Eloquent\UserRepository;

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

        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class,
        );

    }


}
