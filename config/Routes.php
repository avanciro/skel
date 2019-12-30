<?php

use Avanciro\Skel\Core\Route;

// ROUTES
Route::add('/', \App\Controller\Home::class, 'index');
Route::add('/profile/{id}', \App\Controller\Home::class, 'index', array('id' => '[0-9]+'));

?>