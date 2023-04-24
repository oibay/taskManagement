<?php

declare(strict_types=1);

namespace Src\Task\Application\DTO;

final class TaskDTO
{
    public function __construct(public readonly string $id, public readonly string $userId, public ?string $title, public ?string $description)
    {
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }




}
