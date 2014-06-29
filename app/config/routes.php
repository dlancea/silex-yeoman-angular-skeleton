<?php
/*
 * Route definitions
 */
$app->get('/', 'AppName\Controller\Page::index');

$app->get('/template/{templateFile}', 'AppName\Controller\Template::load');

// Auth routes
$app->get('/login', 'AppName\Controller\Auth::login');

if($app['debug'])
	$app->get('/create_password', 'AppName\Controller\Auth::createPassword');

// Data REST calls
$app->get('/data', 'AppName\Controller\Data::get');
$app->get('/data/{dataId}', 'AppName\Controller\Data::get');

$app->put('/data', 'AppName\Controller\Data::put');
$app->put('/data/{dataId}', 'AppName\Controller\Data::put');

$app->post('/data', 'AppName\Controller\Data::post');

$app->delete('/data/{dataId}', 'AppName\Controller\Data::delete');
