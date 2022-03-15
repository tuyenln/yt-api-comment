<?php

namespace App\Tests\Comment\Infrastructure;

use App\Comment\Infrastructure\CommentPostEndpoint;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use SimpleBus\SymfonyBridge\Bus\EventBus;
use Symfony\Component\HttpFoundation\Request;

class CommentPostEndpointTest extends WebTestCase
{

    /** @test */
    public function aCommentCanBePosted()
    {
        $client = $this->createClient();

        $client->request('POST',
            '/api/comment/postcomment',
            [
                'topicId' => 'B',
                'userId' => 'A',
                'comment' => 'Hi Youtube!'
            ]
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('success', $client->getResponse()->getContent());
    }

    /** @test */
    public function endpointReturnesFailedWhenNoPostDataGiven()
    {
        $client = $this->createClient();

        $client->request('POST',
            '/api/comment/postcomment',
            []
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('failed', $client->getResponse()->getContent());
    }

    /** @test */
    public function endpointCreatesAnEventOnTheEventBus()
    {
        /** @var EventBus $eventBus */
        $eventBus = $this->bootKernel()->getContainer()->get('Test.eventBus');

        $endpoint = new CommentPostEndpoint($eventBus);

        $request = new Request([],[
            'topicId' => 'B',
            'userId' => 'A',
            'comment' => 'Hi Youtube!'
        ]);

        $response = $endpoint->createComment($request);

        $this->assertEquals('success', $response->getContent());
    }
}