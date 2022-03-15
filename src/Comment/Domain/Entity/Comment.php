<?php

namespace App\Comment\Domain\Entity;

class Comment implements \JsonSerializable
{
    private $id;
    private $userId;
    private $topicId;
    private $comment;

    public function __construct(string $userId, string $topicId, string $comment)
    {
        $this->userId = $userId;
        $this->topicId = $topicId;
        $this->comment = $comment;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getTopicId(): string
    {
        return $this->topicId;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function jsonSerialize(): array
    {
        return [
            'comment' =>[
                'userId' => $this->getUserId(),
                'topicId' => $this->getTopicId(),
                'comment' => $this->getComment()
            ]
        ];
    }
}