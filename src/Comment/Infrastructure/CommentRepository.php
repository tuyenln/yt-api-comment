<?php

namespace App\Comment\Infrastructure;

use App\Comment\Domain\CommentRepositoryInterface;
use App\Comment\Domain\Entity\Comment;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{
    public function getCommentById(int $id): Comment
    {
        /** @var Comment $comment */
        $comment = $this->find($id);

        return $comment;
    }
}