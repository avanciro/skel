<?php

namespace Avanciro\Skel\Core;

use Symfony\Component\Routing\Route as Symfony_Route;
use Symfony\Component\HttpFoundation\Request as Symfony_Request;
use Symfony\Component\Routing\RequestContext as Symfony_RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher as Symfony_UrlMatcher;
use Symfony\Component\Routing\RouteCollection as Symfony_RouteCollection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException as Symfony_ResourceNotFoundException;


class Route {

    protected $Registry= null;
    protected $RouteCollection = null;

    public function __construct($Registry) {
        $this->Registry = $Registry;
        $this->RouteCollection = new Symfony_RouteCollection();
    }

    public function get($name, $expression, $controller, $method, $param = null) {
        if ( $param !== NULL ):
            $this->RouteCollection->add($name, new Symfony_Route($expression, [ '_controller' => $controller, '_method' => $method ], $param));
        else:
            $this->RouteCollection->add($name, new Symfony_Route($expression, [ '_controller' => $controller, '_method' => $method ]));
        endif;
    }

    public function dispatch() {
        require_once dirname(dirname(__DIR__)).'/config/Routes.php';

        try {

            // Symfony_RequestContext
            $Symfony_RequestContext = new Symfony_RequestContext();
            $Symfony_RequestContext->fromRequest(Symfony_Request::createFromGlobals());

            // Symfony_UrlMatcher
            $Symfony_UrlMatcher = new Symfony_UrlMatcher($this->RouteCollection, $Symfony_RequestContext);
            $parameters = $Symfony_UrlMatcher->match($Symfony_RequestContext->getPathInfo());

            $this->Registry->load->controller($parameters['_controller'], $parameters['_method']);

        } catch (Symfony_ResourceNotFoundException $error) {
            echo $error->getMessage();
        }
    }
}

?>