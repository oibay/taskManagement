<?php

declare(strict_types=1);

namespace Src\Users\Application\SignUp;
use Src\Shared\Application\Command as CommandInterface;
use Src\Users\Application\DTO\UserCreateDTO;

final class Command implements CommandInterface
{
    public function __construct(public readonly UserCreateDTO $createDTO)
    {

    }
}
