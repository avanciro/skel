<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;


class Loader {

    protected $_registry = NULL;

    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;
    }



    /**
     * This method is responsible for loading controllers
     * according to the data provided. This will search
     * for the Controller file and then will call
     * require_once for that specific file only.
     *    - Load file ( require_once )
     *    - Create controller instance
     *    - call to method of controller with parameters
     * 
     * @param String $controller
     * @param String $method
     * @param Array $params
     */
    public function controller($controller, $method, Array $params = null) {
        require_once dirname(dirname(__DIR__)).'/controllers/'.explode("_", $controller)[0].'.php';

        /**
         * We have to check if we got valid set of parameters
         * before passing them into the Controller class
         */
        if ( is_array($params) AND !empty($params) ):
            call_user_func_array( array(new $controller($this->_registry), $method), $params);
        else:
            call_user_func( array(new $controller($this->_registry), $method));
        endif;
    }



    /**
     * This method is responsile for loading twig
     * view. This function will require 2 params to
     * be passed
     * 
     * @param String $view
     * @param Array $data
     * @return Void
     */
    public function view(String $view, Array $data) {
        if ( file_exists(dirname(dirname(__DIR__)).'/'.$this->_registry->config->twig->directory.'/'.$view.'.twig') ):
            echo $this->_registry->twig->render($view.'.twig', $data);
        else:

            /**
             * It seems like application comes to a point that it
             * can't locate twig file to load. We have to display
             * friendly error for the end user
             */
            throw new \Exception("Incorrect template file path.");

        endif;
    }
}

?>