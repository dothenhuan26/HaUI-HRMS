<?php

namespace Modules\Chat;

use App\Menu\Facade\MenuFacade;
use App\Menu\MenuManager;
use Modules\Chat\Repositories\Contracts\ConversationRepositoryInterface;
use Modules\Chat\Repositories\Eloquent\ConversationRepository;
use Modules\ModuleServiceProvider;
use Modules\Chat\Repositories\Contracts\ChatGroupRepositoryInterface;
use Modules\Chat\Repositories\Eloquent\ChatGroupGroupRepository;
use Modules\Chat\RouteServiceProvider;

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
            ChatGroupRepositoryInterface::class,
            ChatGroupGroupRepository::class
        );
        $this->app->singleton(
            ConversationRepositoryInterface::class,
            ConversationRepository::class
        );

        $this->app->singleton('menu', function () {
            return new MenuManager();
        });

        $this->registerMenu();

    }

    protected function registerMenu()
    {
        MenuFacade::add('Main', 'Apps', 'Chat', 'chat.public.index');
    }


}
