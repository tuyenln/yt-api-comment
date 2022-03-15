<?php

namespace App\Tests\IAmAlive;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class IAmAliveControllerTest extends WebTestCase
{
    /** @test */
    public function IAmAliveReturnsStatusCode200()
    {
        $client = $this->createClient();

        $client->request('GET','/api/comment/i-am-alive');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}