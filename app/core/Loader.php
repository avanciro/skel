<?php

namespace Avanciro\Skel\Core;

class Loader {

    protected $Registry = NULL;

    public function __construct($Registry) {
        $this->Registry = $Registry;
    }

    public function controller($controller, $method, $params = null) {

        require_once dirname(dirname(__DIR__)).'/controllers/'.explode("_", $controller)[0].'.php';

        /**
         * We have to check if we got valid set of parameters
         * before passing them into the Controller class
         */
        if ( is_array($params) ):
            call_user_func_array( array(new $controller, 'index'), $params);
        else:
            call_user_func( array(new $controller, 'index'));
        endif;
    }

}

?>