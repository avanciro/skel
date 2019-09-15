<?php

/**
 * This is the entry point of avanciro/skel framework.
 * This will start serving the request by handing over
 * it to the core.
 */
include_once './app/init.php';
$App = new Avanciro\Skel\Core\App;
$App::dispatch();

?>