<?php

declare(strict_types=1);

namespace Src\Shared\Application;

interface QueryBus
{
    public function handle(Query $query): Response;
}
