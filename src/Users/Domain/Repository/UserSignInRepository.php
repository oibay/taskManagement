<?php

declare(strict_types=1);

namespace Src\Users\Domain\Repository;


interface UserSignInRepository
{
    public function signIn(string $email, string $password): void;
}
