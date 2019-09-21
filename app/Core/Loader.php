<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;


class Loader {

    protected $Registry = NULL;

    public function __construct(Registry $Registry) {
        $this->Registry = $Registry;
    }



    /**
     * This method is responsible for loading controllers
     * according to the data provided. This will search
     * for the Controller file and then will call
     * require_once for that specific file only.
     *    - Load file ( require_once )
     *    - Create controller instance
     *    - call to method of controller with parameters
     */
    public function controller($controller, $method, $params = null) {
        require_once dirname(dirname(__DIR__)).'/controllers/'.explode("_", $controller)[0].'.php';

        /**
         * We have to check if we got valid set of parameters
         * before passing them into the Controller class
         */
        if ( is_array($params) AND !empty($params) ):
            call_user_func_array( array(new $controller($this->Registry), $method), $params);
        else:
            call_user_func( array(new $controller($this->Registry), $method));
        endif;
    }



    public function model($model) {

        /**
         * We need to explode the path data and capitalize
         * the first letter.
         */
        $model = explode("/", $model);
        $path['file'] = null;
        foreach( $model as $key => $value ):
            $model[$key] = ucfirst($value);
            $path['file'] .= $model[$key].'/';
        endforeach;

        // GENERATE THINGS
        $path['file'] = rtrim($path['file'], '/').".php";

        // REQUIRE FILE
        require_once dirname(dirname(__DIR__)).'/models/'.$path['file'];
    }
}

?>