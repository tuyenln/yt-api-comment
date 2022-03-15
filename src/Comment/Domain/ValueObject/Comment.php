<?php

namespace App\Comment\Domain\ValueObject;

class Comment
{
    private $topicId;
    private $userId;
    private $comment;

    public function __construct(string $topicId, string $userId, string $comment)
    {
        $this->topicId = $topicId;
        $this->userId = $userId;
        $this->comment = $comment;
    }

    public function getTopicId(): string
    {
        return $this->topicId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

}