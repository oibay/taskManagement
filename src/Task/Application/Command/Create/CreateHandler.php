<?php

declare(strict_types=1);

namespace Src\Task\Application\Command\Create;

use Src\Shared\Application\CommandHandler;
use Src\Shared\Domain\ValueObject\UuidValueObject;
use Src\Task\Domain\Entity\Description;
use Src\Task\Domain\Entity\Task;
use Src\Task\Domain\Entity\Title;
use Src\Task\Domain\Entity\UserId;
use Src\Task\Domain\Repository\TaskRepositoryInterface;

final class CreateHandler implements CommandHandler
{
    public function __construct(private readonly TaskRepositoryInterface $taskRepository)
    {
    }

    public function __invoke(CreateCommand $command)
    {
        $id = new UuidValueObject($command->dto->getId());
        $userId = new UserId($command->dto->getUserId());
        $title = new Title($command->dto->getTitle());
        $description = new Description($command->dto->getDescription());

        $task = Task::create($id, $userId,$title, $description);

        $this->taskRepository->create($task);
    }
}
