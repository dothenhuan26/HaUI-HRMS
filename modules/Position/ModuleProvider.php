<?php

namespace Modules\Position;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
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

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('Administration', 'Jobs', 'Quản lý việc làm', 'position.admin.index');
        MenuFacade::addIcon('Jobs', '<i class="la la-briefcase"></i>');
    }


}
