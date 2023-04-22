<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Bus;

use Illuminate\Support\Facades\App;
use Src\Shared\Application\Command;
use Src\Shared\Application\CommandBus;

class InMemoryCommandBus implements CommandBus
{
    public function handle(Command $command): void
    {
        //var_dump($command);
        $reflection = new \ReflectionClass($command);

        $handlerName = str_replace('Command', 'Handler', $reflection->getShortName());

        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());

        $handler = App::make($handlerName);

        $handler($command);
    }
}
