<?php

namespace Modules\Dashboard;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
use Modules\ModuleServiceProvider;
use Modules\Dashboard\Repositories\Contracts\DashboardRepositoryInterface;
use Modules\Dashboard\Repositories\Eloquent\DashboardRepository;
use Modules\Dashboard\RouteServiceProvider;

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
            DashboardRepositoryInterface::class,
            DashboardRepository::class
        );

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('Main', 'Dashboard', 'Admin Dashboard', 'dashboard.admin.index');
        MenuFacade::add('Main', 'Dashboard', 'Employee Dashboard', 'dashboard.employee.index');
    }


}
