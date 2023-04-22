<?php

declare(strict_types=1);

namespace Src\Users\Application\Create;

use Src\Shared\Application\CommandHandler;
use Src\Shared\Domain\ValueObject\UuidValueObject;
use Src\Users\Application\Exceptions\UserAlreadyExistException;
use Src\Users\Domain\Entity\Credentials;
use Src\Users\Domain\Entity\Email;
use Src\Users\Domain\Entity\HashedPassword;
use Src\Users\Domain\Entity\Name;
use Src\Users\Domain\Entity\User;
use Src\Users\Domain\Repository\UserCreateRepository;

final class Handler implements CommandHandler
{
    public function __construct(private readonly UserCreateRepository $repository)
    {
    }

    public function __invoke(Command $command): void
    {
        $id          = new UuidValueObject($command->createDTO->getId());
        $name        = new Name($command->createDTO->getName());
        $email       = new Email($command->createDTO->getEmail());


        if ($this->repository->isEmailAlreadyExist($email)) {
            throw new UserAlreadyExistException();
        }
        $password    = HashedPassword::encode($command->createDTO->getPassword());
        $credentials = new Credentials($email, $password);

        $user = User::create($id, $credentials, $name);

        $this->repository->store($user,$password);
    }
}
