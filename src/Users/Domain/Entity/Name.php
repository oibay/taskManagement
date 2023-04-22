<?php

declare(strict_types=1);

namespace Src\Users\Domain\Entity;

use Src\Shared\Domain\ValueObject\StringValueObject;

final class Name extends StringValueObject
{
    public function __construct(public readonly string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("Name must be filled");
        }
    }
}
