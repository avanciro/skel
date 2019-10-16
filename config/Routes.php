<?php

use Avanciro\Skel\Core\Route;

// ROUTES
Route::get('/', 'Home_Controller', 'index');
Route::get('/profile/{id}', 'Home_Controller', 'index', array('id' => '[0-9]+'));

?>