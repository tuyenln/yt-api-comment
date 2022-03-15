<?php

namespace App\Comment\Domain\ValueObject;

class CommentUpsertedEvent
{
    private $data;

    public function __construct(Comment $comment)
    {
        $this->data = $comment;
    }

    public function getData(): Comment
    {
        return $this->data;
    }
}