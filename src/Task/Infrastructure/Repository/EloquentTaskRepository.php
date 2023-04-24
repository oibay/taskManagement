<?php

declare(strict_types=1);

namespace Src\Task\Infrastructure\Repository;

use Illuminate\Support\Facades\DB;
use Src\Task\Domain\Entity\Task;
use Src\Task\Domain\Repository\TaskRepositoryInterface;
use Src\Task\Infrastructure\Orm\EloquentTask;

class EloquentTaskRepository implements TaskRepositoryInterface
{

    public function create(Task $task): void
    {
        DB::transaction(function () use ($task)  {
            $taskCreate = new EloquentTask();
            $taskCreate->id             = $task->getId();
            $taskCreate->user_id        = $task->getUserId();
            $taskCreate->title          = $task->getTitle();
            $taskCreate->description    = $task->getDescription();
            $taskCreate->save();
        });
    }
}
