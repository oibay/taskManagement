<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Bus;

use Illuminate\Support\Facades\App;
use Src\Shared\Application\Query;
use Src\Shared\Application\QueryBus;
use Src\Shared\Application\Response;

class InMemoryQueryBus implements QueryBus
{

    public function handle(Query $query): Response
    {
        $reflection = new \ReflectionClass($query);
        $handlerName = str_replace('Query', 'Handler', $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        $handler = App::make($handlerName);

        return $handler($query);
    }
}
