<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Route;
use Avanciro\Skel\Core\Config;
use Avanciro\Skel\Core\Database;

/**
 * This is where Skel start doing things upon getting
 * new request. This will include
 */
class App {
    public function dispatch() {

        // REGISTRY
        $Registry = new Registry;


        /**
         * We use loader mechanisam to load things into
         * the framework.
         *    - Controllers
         *    - Models
         */
        $Registry->set('load', new Loader($Registry));


        /**
         * We need to accesss configurations to use in
         * other components of the framework. So we first
         * load Configuration manager
         */
        $Registry->set('config', new Config);


        /**
         * Framework need to load Eloquent ORM to the
         * system and also need to oot Eloquent in order
         * to use in it models
         */
        new Database($Registry);


        /**
         * Initialize SESSION parameters to handle login kind
         * of stuff
         */
        $Registry->set('session', new \Avanciro\Skel\Core\Session);

        /**
         * We need to intercept the request.
         */
        $Registry->set('request', new Request);


        /**
         * We nede to load Twig template engine into
         * the play before start using it.
         */
        new Twig($Registry);


        /**
         * We can now dispatch the framework to the
         * specified route because all the initialization
         * is done by now.
         */
        $Route = new Route($Registry);
        $Route->dispatch();
    }
}

?>