<?php

declare(strict_types=1);

namespace Src\Users\Domain\Entity;

final class Credentials
{
    public function __construct(
        public readonly Email $email,
        public readonly HashedPassword $password,
    ) {
    }
}
