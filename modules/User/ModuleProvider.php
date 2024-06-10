<?php

namespace Modules\User;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
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

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('Employees', 'Employees', 'All Employees', 'user.admin.index');
        MenuFacade::add('Employees', 'Employees', "Role Manager", 'user.admin.role.index');
    }


}
