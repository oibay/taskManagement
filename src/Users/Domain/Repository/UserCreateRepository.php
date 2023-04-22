<?php

declare(strict_types=1);

namespace Src\Users\Domain\Repository;

use Src\Users\Domain\Entity\Email;
use Src\Users\Domain\Entity\HashedPassword;
use Src\Users\Domain\Entity\User;

interface UserCreateRepository
{
    public function store(User $user, HashedPassword $password): void;

    public function isEmailAlreadyExist(Email $email): bool;
}
