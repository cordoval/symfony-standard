<?php

namespace Cordoval\ABundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/a/');

        $this->assertContains('Hello B!', $crawler->text());
    }
}
