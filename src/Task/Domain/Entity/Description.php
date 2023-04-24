<?php

declare(strict_types=1);

namespace Src\Task\Domain\Entity;

use Src\Shared\Domain\ValueObject\StringValueObject;

final class Description extends StringValueObject
{
    public function __construct(public readonly string $value)
    {

    }


    public function __toString(): string
    {
        return $this->value;
    }
}
