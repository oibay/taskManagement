<?php

declare(strict_types=1);

namespace Src\Users\Application\SignIn;

use Src\Shared\Application\CommandHandler;
use Src\Users\Domain\Entity\Email;
use Src\Users\Domain\Repository\UserSignInRepository;
use Src\Users\Infrastructure\Events\ClearOAuthAccessUserEvent;

final class Handler implements CommandHandler
{

    public function __construct(private readonly UserSignInRepository $signInRepository)
    {
    }

    public function __invoke(Command $command)
    {
        $this->signInRepository->signIn((string)(new Email($command->email)), $command->password);

        ClearOAuthAccessUserEvent::dispatch((string)auth()->id());
    }
}
