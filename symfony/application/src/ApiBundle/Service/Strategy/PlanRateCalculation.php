<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 28/09/18
 * Time: 09:43
 */

namespace ApiBundle\Service\Strategy;

use ApiBundle\Entity\Call;

/**
 * Class PlanRateCalculation
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Service\Strategy
 */
class PlanRateCalculation implements RateCalculationInterface
{
    public function calculate()
    {
        /** @var Call $call */
        $call = new Call();

        return $call;
    }

    public function setCall(Call $call)
    {
        return new Call();
    }
}