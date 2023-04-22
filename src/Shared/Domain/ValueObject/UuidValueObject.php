<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid;

class UuidValueObject implements \Stringable
{
    public function __construct(public readonly string $value)
    {
        $this->ensureIsValid($this->value);
    }

    public static function random(): self
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function equals(UuidValueObject $uuidValueObject): bool
    {
        return $this->value === $uuidValueObject->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function ensureIsValid(string $id): void
    {
        if (!Uuid::isValid($id)) {
            throw new \InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }
}
