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
        $Registry->set('config', new Config($Registry));

        // DATABASE ( Eloquent ORM )
        new Database($Registry);

        // ROUTES
        $Route = new Route($Registry);
        $Route->dispatch();
    }
}

?>