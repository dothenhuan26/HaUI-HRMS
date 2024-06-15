<?php

namespace Modules\User;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
use Illuminate\Support\Facades\Auth;
use Modules\ModuleServiceProvider;
use Modules\User\Repositories\Contracts\ContractRepositoryInterface;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Modules\User\Repositories\Eloquent\ContractRepository;
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

        $this->app->singleton(
            ContractRepositoryInterface::class,
            ContractRepository::class,
        );

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('Employees', 'Employees', "Danh sách nhân sự", 'user.admin.index', [1,2]);
        MenuFacade::add('Employees', 'Employees', "Quản lý vai trò", 'user.admin.role.index', [1,2]);
        MenuFacade::add('Employees', 'Employees', "On Job Training", 'ojt.admin.index', [1,2]);
        MenuFacade::addIcon('Employees', '<i class="la la-user"></i>');
    }


}
