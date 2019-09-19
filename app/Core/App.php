<?php

namespace Avanciro\Skel\Core;

use Avanciro\Skel\Core\Route;
use Avanciro\Skel\Core\Registry;

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

        // ROUTES
        $Route = new Route($Registry);
        $Route->dispatch();
    }
}

?>