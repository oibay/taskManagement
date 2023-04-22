<?php

declare(strict_types=1);

namespace Src\Shared\Application;

interface Response
{
    public function toArray(): array;
}
