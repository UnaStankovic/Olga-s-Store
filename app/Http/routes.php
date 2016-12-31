<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('api/', function () use ($app) {
    return $app->version();
});

//REST API
$app->post('api/register','UserController@register');
$app->post('api/login', 'UserController@login');
$app->get('api/logout', 'UserController@logout');

$app->get('confirm/{id}/{code}', 'UserController@confirm');