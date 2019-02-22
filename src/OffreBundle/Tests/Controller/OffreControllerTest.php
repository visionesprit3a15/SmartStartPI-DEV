<?php

namespace OffreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OffreControllerTest extends WebTestCase
{
    public function testAffiche()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/affiche');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show');
    }

    public function testMesprojets()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mesprojets');
    }

    public function testPostuler()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postuler');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

}
