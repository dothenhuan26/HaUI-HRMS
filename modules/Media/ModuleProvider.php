<?php

namespace Modules\Media;

use Modules\ModuleServiceProvider;
use Modules\Media\Repositories\Contracts\MediaRepositoryInterface;
use Modules\Media\Repositories\Eloquent\MediaRepository;
use Modules\Media\RouteServiceProvider;

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
            MediaRepositoryInterface::class,
            MediaRepository::class
        );

    }





}
