<?php

namespace Tests\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiControllerTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Controller\ApiController
 * @package ApiBundle\Tests\Controller
 */
class ApiControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \GuzzleHttp\Client $client */
    private $client;

    public function setUp()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => 'http://nginx/']);
    }

    /**
     * @covers \ApiBundle\Controller\ApiController::calculateAction()
     */
    public function testCalculate()
    {
        $response = $this->client->post('/api/calculate/1/3/2/80');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

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