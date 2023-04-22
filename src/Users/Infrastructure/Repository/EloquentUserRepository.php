<?php

declare(strict_types=1);

namespace Src\Users\Infrastructure\Repository;

use Illuminate\Support\Facades\DB;
use Src\Users\Domain\Entity\Email;
use Src\Users\Domain\Entity\HashedPassword;
use Src\Users\Domain\Entity\User;
use Src\Users\Domain\Repository\UserCreateRepository;
use Src\Users\Infrastructure\Orm\User as EloquentUser;

class EloquentUserRepository implements UserCreateRepository
{

    public function store(User $user, HashedPassword $password): void
    {
        DB::transaction(function () use ($user, $password) {
            $eloquentUser           = new EloquentUser();
            $eloquentUser->id       = $user->getId();
            $eloquentUser->name     = $user->getName();
            $eloquentUser->email    = $user->getEmail();
            $eloquentUser->password = $password;

            $eloquentUser->save();
        });
    }

    public function isEmailAlreadyExist(Email $email): bool
    {
        return EloquentUser::whereEmail($email)->exists();
    }
}
