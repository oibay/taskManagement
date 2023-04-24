<?php

namespace Src\Task\Infrastructure\Controller\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Shared\Application\CommandBus;
use Src\Shared\Domain\ValueObject\UuidValueObject;
use Src\Task\Application\Command\Create\CreateCommand;
use Src\Task\Application\DTO\TaskDTO;
use Src\Task\Infrastructure\Orm\EloquentTask;
use Src\Task\Infrastructure\Requests\CreateTaskRequest;

class TaskCreateController extends Controller
{

    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function __invoke(CreateTaskRequest $request)
    {
        $taskDTO = new TaskDTO(
            (string)UuidValueObject::random(),
            auth()->id(),
            $request->get('title'),
            $request->get('description')
        );

        try {
            $command = new CreateCommand($taskDTO);
            $this->commandBus->handle($command);

            return response()->json(['data' => EloquentTask::find($taskDTO->getId())]);
        }catch (\InvalidArgumentException $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
