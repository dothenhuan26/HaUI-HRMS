<?php

namespace Modules\Chat;

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

    }


}
