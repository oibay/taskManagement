<?php

declare(strict_types=1);

namespace Src\Task\Domain\Entity;

use Src\Shared\Domain\ValueObject\UuidValueObject;

final class Task
{
    public function __construct(
        public readonly UuidValueObject $id,
        public readonly UserId $userId,
        public readonly Title $title,
        public readonly Description $description
    )
    {

    }

    public static function create(
        UuidValueObject $id,
        UserId          $userId,
        Title           $title,
        Description     $description,
    ): self
    {
        return new self(
            $id,
            $userId,
            $title,
            $description
        );
    }

    /**
     * @return UuidValueObject
     */
    public function getId(): UuidValueObject
    {
        return $this->id;
    }

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @return Description
     */
    public function getDescription(): Description
    {
        return $this->description;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }
}
