<?php

namespace App\Comment\Infrastructure;

use App\Comment\Domain\ValueObject\Comment;
use App\Comment\Domain\ValueObject\CommentUpsertedEvent;
use SimpleBus\SymfonyBridge\Bus\EventBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentPostEndpoint extends AbstractController
{
    private $eventBus;

    public function __construct(EventBus $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function createComment(Request $request): Response
    {
        if (
            empty($request->request->get('topicId')) &&
            empty($request->request->get('userId')) &&
            empty($request->request->get('comment'))
        ) {
            return new Response('failed');
        }

        $comment = new Comment(
            $request->request->get('topicId'),
            $request->request->get('userId'),
            $request->request->get('comment')
        );

        $commentUpsertedEvent = new CommentUpsertedEvent($comment);

        $this->eventBus->handle($commentUpsertedEvent);

        return new Response('success');
    }

}