<?php

declare(strict_types=1);

namespace Src\Task\Application\Command\Create;
use Src\Shared\Application\Command as CommandInterface;
use Src\Task\Application\DTO\TaskDTO;

final class CreateCommand implements CommandInterface
{
    public function __construct(public readonly TaskDTO $dto)
    {
    }
}
