<?php

namespace Tests\ApiBundle\Service\Game;

use ApiBundle\Entity\Call;
use ApiBundle\Entity\Plan;
use ApiBundle\Service\Strategy\PlanRateCalculation;
use ApiBundle\Service\Strategy\RateCalculation;

/**
 * Class RateCalcultationTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Service\Strategy\RateCalculation
 * @package ApiBundle\Tests\Entity
 */
class RateCalcultationTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PlanRateCalculation */
    private $rateCalculation;


    public function setUp()
    {
        $this->rateCalculation = new RateCalculation();
    }

    /**
     * @covers \ApiBundle\Service\Strategy\RateCalculation::setCall
     * @return Call $call
     * @depends testRegistrationWeakPassword
     */
    public function testSetCall()
    {
        $call = new Call();
        $call
            ->setOrigin('011')
            ->setDestination('016')
            ->setRate(1.9)
            ->setTime(123);

        $plan = new Plan();
        $plan
            ->setTime(30)
            ->setName('FaleMais 30');

        $call->setPlan($plan);

        $rateCalculation = $this->rateCalculation->setCall($call);

        $this->assertInstanceOf("\ApiBundle\Service\Strategy\PlanRateCalculation", $rateCalculation);

        return $call;
    }

    /**
     * @covers \ApiBundle\Service\Strategy\RateCalculation::calculate
     * @param Call $call
     * @depends testSetCall
     */
    public function testCalculate($call)
    {

    }
}