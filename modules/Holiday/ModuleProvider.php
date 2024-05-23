<?php

namespace Modules\Holiday;

use Modules\ModuleServiceProvider;
use Modules\Holiday\Repositories\Contracts\HolidayRepositoryInterface;
use Modules\Holiday\Repositories\Eloquent\HolidayRepository;
use Modules\Holiday\RouteServiceProvider;

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
            HolidayRepositoryInterface::class,
            HolidayRepository::class
        );

    }





}
