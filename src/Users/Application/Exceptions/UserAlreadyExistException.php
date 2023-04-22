<?php

declare(strict_types=1);

namespace Src\Users\Application\Exceptions;

final class UserAlreadyExistException extends \Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message ?: 'This email is already exist');
    }
}
