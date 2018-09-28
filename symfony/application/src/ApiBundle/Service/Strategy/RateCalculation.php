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
 * Class RateCalculation
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Service\Strategy
 */
class RateCalculation implements RateCalculationInterface
{
    /** @var Call $call */
    private $call;

    /**
     * @return Call
     */
    public function calculate()
    {
        return $this->call->setRateCost($this->call->getTime() * $this->call->getRate());
    }

    /**
     * @param Call $call
     * @return $this
     */
    public function setCall(Call $call)
    {
        $this->call = $call;

        return $this;
    }
}