<?php

declare(strict_types=1);

namespace Src\Users\Application\SignIn;
use Src\Shared\Application\Command as CommandInterface;

final class Command implements CommandInterface
{

    public function __construct(public readonly string $email, public readonly string $password)
    {
    }
}
