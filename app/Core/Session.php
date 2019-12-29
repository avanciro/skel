<?php

namespace Avanciro\Skel\Core;

class Session {


    /**
     * This will initialize new $_SESSION
     */
    public function __construct() {
        session_start();
    }



    /**
     * This is the getter that helps to return elements
     * from $_SESSION.
     */
    public function __get($key) {
        if ( $this->has($key) ):
            return $_SESSION[$key];
        else:
            return NULL;
        endif;
    }



    /**
     * This is the setter that set the key, element pairs
     * into the session params,
     */
    public function __set($key, $element) {
        $_SESSION[$key] = $element;
    }



    /**
     * This method will remove the key, value pair from the
     * session params.
     */
    public function forget($key) {
        if ( $this->has($key) ):
            unset($_SESSION[$key]);
        endif;
    }



    /**
     * This method will check if the provided key
     * exists in the session
     */
    public function has($key) {
        if ( array_key_exists($key, $_SESSION) ):
            return true;
        else:
            return false;
        endif;
    }



    /**
     * This method will destroy the whole $_SESSION
     * array once called.
     */
    public function destroy() {
        session_destroy();
    }
}

?>