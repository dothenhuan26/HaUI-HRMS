<?php

namespace Modules\Vendor;

use Modules\ModuleServiceProvider;
use Modules\Vendor\Commands\Module\Controller;
use Modules\Vendor\Commands\Module\Migration;
use Modules\Vendor\Commands\Module\Model;
use Modules\Vendor\Commands\Module\Module;
use Modules\Vendor\Repositories\Contracts\VendorRepositoryInterface;
use Modules\Vendor\Repositories\Eloquent\VendorRepository;
use Modules\Vendor\RouteServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    private $commands = [
        Controller::class,
        Migration::class,
        Model::class,
        Module::class,
    ];

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
        $this->commands($this->commands);
    }


}
