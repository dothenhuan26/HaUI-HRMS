<?php

namespace Modules\Dashboard;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $moduleNamespace = "Modules\Dashboard\Controllers";
    protected $adminModuleNamespace = "Modules\Dashboard\Admin";

    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

    public function map()
    {
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->prefix("employee")
            ->name("dashboard.employee.")
            ->group(__DIR__ . '/Routes/web.php');
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'dashboard'])
            ->namespace($this->adminModuleNamespace)
//            ->prefix('admin/module/dashboard')
            ->prefix('admin')
            ->name("dashboard.admin.")
            ->group(__DIR__ . '/Routes/admin.php');
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(__DIR__ . '/Routes/api.php');
    }

}
