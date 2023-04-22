<?php

declare(strict_types=1);

namespace Src\Shared\Application;

interface CommandBus
{
    public function handle(Command $command): void;
}
