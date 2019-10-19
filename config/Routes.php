<?php

use Avanciro\Skel\Core\Route;

// ROUTES
Route::add('/', 'Home_Controller', 'index');
Route::add('/profile/{id}', 'Home_Controller', 'index', array('id' => '[0-9]+'));

?>