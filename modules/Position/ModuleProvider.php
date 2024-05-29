<?php

namespace Modules\Position;

use Modules\ModuleServiceProvider;
use Modules\Position\Repositories\Contracts\PositionRepositoryInterface;
use Modules\Position\Repositories\Eloquent\PositionRepository;
use Modules\Position\RouteServiceProvider;

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
            PositionRepositoryInterface::class,
            PositionRepository::class
        );

    }





}
