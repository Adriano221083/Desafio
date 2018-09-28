<?php

namespace Tests\ApiBundle\Controller;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \GuzzleHttp\Client $client */
    private $client;

    public function setUp()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => 'http://nginx/']);
    }
    public function tearDown()
    {
        $this->client = null;
    }
    public function testNewGame()
    {
        $response = $this->client->post('/api/calculate/1/1/123');

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('origin', $data);
        $this->assertArrayHasKey('destination', $data);
        $this->assertArrayHasKey('rate', $data);
        $this->assertArrayHasKey('time', $data);
        $this->assertArrayHasKey('rateCost', $data);
        $this->assertArrayHasKey('planRateCost', $data);
        $this->assertArrayHasKey('id', $data['plan']);
        $this->assertArrayHasKey('name', $data['plan']);
        $this->assertArrayHasKey('time', $data['plan']);

    }
}