<?php

namespace Avanciro\Skel\Core;

use Avanciro\Skel\Core\Route;


/**
 * This is where Skel start doing things upon getting
 * new request. This will include
 */
class App {
    public function dispatch() {
        $Route = new Route;
        $Route->dispatch();
    }
}

?>