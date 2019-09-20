<?php

use Avanciro\Skel\Core\Route;

// ROUTES
Route::get('home_route', '/', 'Home_Controller', 'index');
Route::get('profile_route', '/profile/{id}', 'Home_Controller', 'profile', array('id' => '[0-9]+'));

?>