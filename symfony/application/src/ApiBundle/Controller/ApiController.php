<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/calculate", name="api_calculate")
     * @Method("POST")
     *
     * @return JsonResponse
     */
    public function calculateAction()
    {
        try {
            dump('here');
            //calculateService->calculate()

        } catch (\Exception $ex) {
            dump('here');
        }
    }
}