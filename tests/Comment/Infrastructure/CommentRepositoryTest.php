<?php

namespace App\Tests\Comment\Infrastructure;

use App\Comment\Domain\CommentRepositoryInterface;
use App\Tests\Comment\Infrastructure\Fixtures\CommentFixture;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class CommentRepositoryTest extends WebTestCase
{
    use FixturesTrait;

    /** @test */
    public function aCommentIsRetrievedFromTheDatastore()
    {
        $this->loadFixtures([CommentFixture::class]);

        $commentRepository = $this->getRepository();

        $comment = $commentRepository->getCommentById(1);

        $this->assertEquals('a', $comment->getTopicId());
        $this->assertEquals('b', $comment->getUserId());
        $this->assertEquals('Hi Danny', $comment->getComment());
    }

    private function getRepository(): CommentRepositoryInterface
    {
        /** @var CommentRepositoryInterface $repository */
        $repository = $this->bootKernel()->getContainer()->get('Test.CommentRepository');
        return $repository;
    }
}