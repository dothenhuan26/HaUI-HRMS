<?php

namespace Modules\Payroll;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
use Modules\ModuleServiceProvider;
use Modules\Payroll\Repositories\Contracts\PayrollRepositoryInterface;
use Modules\Payroll\Repositories\Contracts\SalaryRankRepositoryInterface;
use Modules\Payroll\Repositories\Eloquent\PayrollRepository;
use Modules\Payroll\Repositories\Eloquent\SalaryRankRepository;
use Modules\Payroll\RouteServiceProvider;

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
            PayrollRepositoryInterface::class,
            PayrollRepository::class
        );

        $this->app->singleton(
            SalaryRankRepositoryInterface::class,
            SalaryRankRepository::class
        );

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('HR', 'Payroll', 'Quản lý lương', 'payroll.admin.index');
        MenuFacade::addIcon('Payroll', '<i class="la la-money"></i>');
    }


}
