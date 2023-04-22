<?php

declare(strict_types=1);

namespace Src\Users\Infrastructure\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Src\Users\Domain\Entity\Email;
use Src\Users\Domain\Entity\HashedPassword;
use Src\Users\Domain\Entity\User;
use Src\Users\Domain\Repository\UserCreateRepository;
use Src\Users\Domain\Repository\UserSignInRepository;
use Src\Users\Infrastructure\Orm\User as EloquentUser;

class EloquentUserRepository implements UserCreateRepository, UserSignInRepository
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

    public function signIn(string $email, string $password): void
    {
       if (!Auth::attempt(['email' => $email, 'password' => $password])) {
           throw new \InvalidArgumentException('E-mail или пароль неправильный');
       }

    }
}
