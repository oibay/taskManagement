<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Application\CommandBus;
use Src\Shared\Application\QueryBus;
use Src\Shared\Infrastructure\Bus\InMemoryCommandBus;
use Src\Shared\Infrastructure\Bus\InMemoryQueryBus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CommandBus::class,InMemoryCommandBus::class);
        $this->app->bind(QueryBus::class,InMemoryQueryBus::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
