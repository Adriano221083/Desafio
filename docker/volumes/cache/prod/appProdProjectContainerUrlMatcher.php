<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // app_app_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_app_index');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\AppController::indexAction',  '_route' => 'app_app_index',);
        }

        // api_calculate
        if ($pathinfo === '/api/calculate') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_api_calculate;
            }

            return array (  '_controller' => 'ApiBundle\\Controller\\ApiController::calculateAction',  '_route' => 'api_calculate',);
        }
        not_api_calculate:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
