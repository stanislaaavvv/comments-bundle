<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
    /**
     * @Route ("/lucky/number")
     */
    public function userComments() {


    	// $client = static::createClient();

    	// $crawler = $client->request('GET','/test123');
    	echo '123';
    	// $this->assertEquals(200, $client->getResponse()->getStatusCode());
    	// $this->assertContains('Welcome to comment section', $crawler->filter('#container h1')->text());
    }
}
