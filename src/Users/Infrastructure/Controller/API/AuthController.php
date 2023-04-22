<?php

namespace Src\Users\Infrastructure\Controller\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Shared\Application\CommandBus;
use Src\Users\Application\SignIn\Command as CommandSignInUser;
use Src\Users\Infrastructure\Orm\User as EloquentUser;

class AuthController extends Controller
{

    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function __invoke(Request $request)
    {
        try {
            $command = new CommandSignInUser($request->get('email'), $request->get('password'));
            $this->commandBus->handle($command);
            return response()->json([
                'data' => EloquentUser::getUser($command->email, $command->password)
            ]);
        }catch (\InvalidArgumentException $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
