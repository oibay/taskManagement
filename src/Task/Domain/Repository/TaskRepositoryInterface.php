<?php

declare(strict_types=1);

namespace Src\Task\Domain\Repository;

use Src\Task\Domain\Entity\Task;

interface TaskRepositoryInterface
{
    public function create(Task $task): void;
}
