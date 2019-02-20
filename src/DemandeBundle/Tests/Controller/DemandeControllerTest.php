<?php

namespace DemandeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemandeControllerTest extends WebTestCase
{
    public function testAffiche()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/affiche');
    }

    public function testRecherche()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Recherche');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

}
