<?php

namespace App\Tests\Comment\Infrastructure\Fixtures;

use App\Comment\Domain\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;

class CommentFixture extends AbstractFixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment = new Comment('b','a','Hi Danny');

        $manager->persist($comment);
        $manager->flush();
    }
}