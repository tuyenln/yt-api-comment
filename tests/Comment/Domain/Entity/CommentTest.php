<?php

namespace App\Tests\Comment\Domain\Entity;

use App\Comment\Domain\Entity\Comment;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /** @test */
    public function aCommentCanBeCreated()
    {
        $comment = new Comment('a','b','c');
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertEquals('a', $comment->getUserId());
        $this->assertEquals('b', $comment->getTopicId());
        $this->assertEquals('c', $comment->getComment());
    }

    /** @test */
    public function aCommentCanBeSerialized()
    {
        $comment = new Comment('a','b','c');

        $this->assertJsonStringEqualsJsonString(
            '{
                "comment": {
                "userId": "a",
                "topicId": "b",
                "comment": "c"
            }
        }', json_encode($comment)
        );

    }
}