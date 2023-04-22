<?php

declare(strict_types=1);

namespace Src\Users\Domain\Entity;

use Src\Shared\Domain\ValueObject\StringValueObject;

final class Email extends StringValueObject
{
    public function __construct(public readonly string $value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Must be a valid email');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
