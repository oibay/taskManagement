<?php

declare(strict_types=1);

namespace Src\Users\Infrastructure\Controller\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Src\Shared\Application\CommandBus;
use Src\Shared\Domain\ValueObject\UuidValueObject;
use Src\Users\Application\SignUp\Command as CreateUserCommand;
use Src\Users\Application\DTO\UserCreateDTO;
use Src\Users\Application\Exceptions\UserAlreadyExistException;
use Src\Users\Infrastructure\Orm\User as EloquentUser;
use Src\Users\Infrastructure\Requests\RegisterUserRequest;
use function response;

class RegisterController extends Controller
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function __invoke(RegisterUserRequest $request): JsonResponse
    {
        $userCreateDTO = new UserCreateDTO(
            (string)UuidValueObject::random(),
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );

        try {
            $command = new CreateUserCommand($userCreateDTO);
            $this->commandBus->handle($command);
            return response()->json(EloquentUser::find($userCreateDTO->getId()));
        } catch (\InvalidArgumentException|UserAlreadyExistException $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }
}
