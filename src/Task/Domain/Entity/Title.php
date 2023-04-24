<?php

declare(strict_types=1);

namespace Src\Task\Domain\Entity;

use Src\Shared\Domain\ValueObject\StringValueObject;

final class Title extends StringValueObject
{
    public function __construct(public readonly string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('Title must be filled');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
