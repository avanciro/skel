<?php

use Avanciro\Skel\Core\Route;

// ROUTES
Route::get('home_route', '/', 'Home_Controller', 'index');
Route::get('home_route', '/test/{id}', 'Home_Controller', 'index', array('id' => '[0-9]'));

?>