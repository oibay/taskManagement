<?php

declare(strict_types=1);

namespace Src\Users\Domain\Entity;

use Src\Shared\Domain\ValueObject\UuidValueObject;

final class User
{
    public function __construct(
        public readonly UuidValueObject $id,
        public readonly Email $email,
        public readonly Name $name
    )
    {
    }

    public static function create(
        UuidValueObject $id,
        Credentials     $credentials,
        Name            $name
    ): self
    {
        return new self(
            $id,
            $credentials->email,
            $name
        );
    }

    public function getId(): UuidValueObject
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}
