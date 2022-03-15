<?php

namespace App\Tests\Comment\Infrastructure;

use App\Tests\Comment\Infrastructure\Fixtures\CommentFixture;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class CommentEndpointTest extends WebTestCase
{
    use FixturesTrait;

    /** @test */
    public function ACommentIsRetrievedFromTheEndpoint()
    {
        $this->loadFixtures([CommentFixture::class]);

        $client = $this->createClient();

        $request = $client->request(
            'GET',
            '/api/comment/comment/1'
        );

        $this->assertJsonStringEqualsJsonString(
            file_get_contents(__DIR__ . '/Fixtures/response.json'),
            $client->getResponse()->getContent()
        );
    }

}