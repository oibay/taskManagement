<?php

declare(strict_types=1);

namespace Src\Users\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Src\Users\Domain\Repository\UserCreateRepository;
use Src\Users\Domain\Repository\UserSignInRepository;
use Src\Users\Infrastructure\Repository\EloquentUserRepository;

class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(UserCreateRepository::class, EloquentUserRepository::class);
        $this->app->bind(UserSignInRepository::class, EloquentUserRepository::class);
    }
}
