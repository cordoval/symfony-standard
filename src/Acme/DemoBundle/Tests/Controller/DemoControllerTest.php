<?php

namespace Acme\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoControllerTest extends WebTestCase
{
    public function testIndexOnClientCreation()
    {
        $client = static::createClient(array(), array(
                'HTTP_HOST'       => 'en.example.com',
                'HTTP_USER_AGENT' => 'MySuperBrowser/1.0',
            )
        );

        $crawler = $client->request('GET', '/demo/');

        $this->assertEquals(0, $crawler->filter('html:contains("host: localhost")')->count());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("host: en.example.com")')->count());
    }

    public function testIndexFromRequest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/demo/', array(), array(), array(
                'HTTP_HOST'       => 'en.example.com',
                'HTTP_USER_AGENT' => 'MySuperBrowser/1.0',
            )
        );

        $this->assertEquals(0, $crawler->filter('html:contains("host: localhost")')->count());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("host: en.example.com")')->count());
    }

    public function testIndexFromSetParameter()
    {
        $client = static::createClient();

        $client->setServerParameters(array(
                'HTTP_HOST'       => 'en.example.com',
                'HTTP_USER_AGENT' => 'MySuperBrowser/1.0',
            )
        );
        $crawler = $client->request('GET', '/demo/');

        $this->assertEquals(0, $crawler->filter('html:contains("host: localhost")')->count());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("host: en.example.com")')->count());
    }
}
