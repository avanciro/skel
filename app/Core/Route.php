<?php

namespace Avanciro\Skel\Core;

use Avanciro\Skel\Core\Registry;
use Symfony\Component\Routing\Route as Symfony_Route;
use Symfony\Component\HttpFoundation\Request as Symfony_Request;
use Symfony\Component\Routing\RequestContext as Symfony_RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher as Symfony_UrlMatcher;
use Symfony\Component\Routing\RouteCollection as Symfony_RouteCollection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException as Symfony_ResourceNotFoundException;


class Route {

    protected $Registry = null;
    protected $RouteCollection = null;

    public function __construct(Registry $Registry) {
        $this->Registry = $Registry;
        $this->RouteCollection = new Symfony_RouteCollection();
    }

    public function get($name, $expression, $controller, $method, $param = null) {
        if ( isset($param) AND is_array($param) ):
            $this->RouteCollection->add($name, new Symfony_Route($expression, [ '_controller' => $controller, '_method' => $method ], $param) );
        else:
            $this->RouteCollection->add($name, new Symfony_Route($expression, [ '_controller' => $controller, '_method' => $method ]));
        endif;
    }



    private function resolveParameters($params) {

        /**
         * First we want to remove unwanted data
         * from the array to filter only the params
         *    - Controller
         *    - Method
         *    - Route Name
         */
        unset($params['_controller']);
        unset($params['_method']);
        unset($params['_route']);


        /**
         * Now we can get all the params and build
         * a array based on them to return as our
         * parameters.
         */
        $data = array();
        foreach ( $params as $key => $value ):
            $data[$key] = $value;
        endforeach;
        return $data;
    }



    /**
     * This method is responsible for dispatch all the
     * requests to correct controllers using Loader in
     * the Core.
     */
    public function dispatch() {
        require_once dirname(dirname(__DIR__)).'/config/Routes.php';
        try {
            $Symfony_UrlMatcher = new Symfony_UrlMatcher($this->RouteCollection, new Symfony_RequestContext());
            $attributes = $Symfony_UrlMatcher->matchRequest(Symfony_Request::createFromGlobals());
            $this->Registry->load->controller($attributes['_controller'], $attributes['_method'], self::resolveParameters($attributes));
        } catch (Symfony_ResourceNotFoundException $error) {

            /**
             * Seems like there is no such a route defined in
             * our route map. It's time to push 404 error page
             * for the user;
             *    - Manipulate HTTP status code to 404
             *    - Error page controller
             */
            echo $error;
        }
    }
}

?>