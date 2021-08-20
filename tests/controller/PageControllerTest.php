<?php

namespace App\tests\controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PageControllerTest extends WebTestCase{

    public function testBlogsPage(){
        $client = static::createClient();
        $crawler =  $client->request('GET', '/blogs');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testBlogs1Page(){
        $client = static::createClient();
        $client->request('GET', '/blogs');
        $this->assertSelectorTextContains('h2' , 'test');
    }
}