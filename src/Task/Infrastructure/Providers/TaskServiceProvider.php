<?php

declare(strict_types=1);

namespace Src\Task\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Task\Domain\Repository\TaskRepositoryInterface;
use Src\Task\Infrastructure\Repository\EloquentTaskRepository;

class TaskServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(TaskRepositoryInterface::class, EloquentTaskRepository::class);
    }
}
