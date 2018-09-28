<?php
namespace Tests\ApiBundle\Entity;

use ApiBundle\Entity\Call;
use ApiBundle\Entity\Plan;

/**
 * Class CallTest
 * @covers \ApiBundle\Entity\Call
 * @package ApiBundle\Tests\Entity
 */
class CallTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Call
     */
    protected $call;

    protected function setUp()
    {
        $this->call = new Call();
    }

    public function testGetterAndSetter()
    {
        $this->assertNull($this->call->getId());

        $this->call->setOrigin('015');
        $this->assertEquals('015', $this->call->getOrigin());

        $this->call->setDestination('053');
        $this->assertEquals('053', $this->call->getDestination());

        $this->call->setPlanRateCost(34.4);
        $this->assertEquals(34.4, $this->call->getPlanRateCost());

        $this->call->setRateCost(200.44);
        $this->assertEquals(200.44, $this->call->getRateCost());

        $this->call->setRate(20.23);
        $this->assertEquals(20.23, $this->call->getRate());

        $this->call->setTime(100);
        $this->assertEquals(100, $this->call->getTime());

        $this->call->setPlan(new Plan());
        $this->assertEquals(new Plan(), $this->call->getPlan());
    }
}
