<?php

namespace Modules\Designation;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
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

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('Employees', 'Employees', 'Vị trí công việc', 'designation.admin.index');
    }


}
