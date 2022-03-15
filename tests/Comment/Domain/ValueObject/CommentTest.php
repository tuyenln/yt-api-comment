<?php

namespace App\Tests\Comment\Domain\ValueObject;

use App\Comment\Domain\ValueObject\Comment;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /** @test */
    public function aCommentCanBeCreated()
    {
        $comment = new Comment('a', 'b', 'c');
        $this->assertEquals('a', $comment->getTopicId());
        $this->assertEquals('b', $comment->getUserId());
        $this->assertEquals('c', $comment->getComment());
    }
}