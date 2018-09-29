<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Call;
use ApiBundle\Entity\Plan;
use ApiBundle\Service\Normalize\CallNormalizer;
use ApiBundle\Service\Strategy\PlanRateCalculation;
use ApiBundle\Service\Strategy\RateCalculation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class ApiController
 * @Route("/")
 *
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Controller
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/calculate/{call}/{plan}/{time}", name="api_calculate")
     * @Method({"GET", "POST"})
     * @param Call $call
     * @param Plan $plan
     * @param int $time
     * @return JsonResponse
     */
    public function calculateAction(Call $call, Plan $plan, int $time)
    {
        try {
            /** @var RateCalculation $planRateCalculationService */
            $rateCalculation = $this->get('api.rate_calculation');
            /** @var PlanRateCalculation $planRateCalculationService */
            $planRateCalculation = $this->get('api.plan_rate_calculation');
            /** @var CallNormalizer $callNormalizer */
            $callNormalizer = $this->get('api.call_normalizer');

            $call
                ->setPlan($plan)
                ->setTime($time);

            $call = $rateCalculation
                ->setCall($call)
                ->calculate();

            $call = $planRateCalculation
                ->setCall($call)
                ->calculate();

            return $this->createResponse($callNormalizer->normalize($call), Response::HTTP_OK);

        } catch (\Exception $ex) {
            return $this->createResponse($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}