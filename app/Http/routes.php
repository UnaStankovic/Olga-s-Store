<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|---------------------------------------    -----------------------------------
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
//login/logout/register
$app->post('api/register','UserController@register');
$app->post('api/login', 'UserController@login');
$app->get('api/logout', 'UserController@logout');

//user
$app->get('api/user', 'UserController@index');
$app->get('api/user/{id}', 'UserController@getUser');
$app->put('api/user/{id}', 'UserController@changeUser');
$app->delete('api/user/{id}', 'UserController@deleteUser');

//product
$app->get('api/product', 'ProductController@index');
$app->get('api/product/{id}', 'ProductController@getProduct');
$app->put('api/product/{id}', 'ProductController@updateProduct');
$app->delete('api/product/{id}', 'ProductController@deleteProduct');

//has
$app->get('api/has', 'HasController@index');
$app->get('api/has/{id}', 'HasController@getPrivilegesForUser');
$app->post('api/has', 'HasController@createPrivilege');
$app->delete('api/has/{id}/{privilege}', 'HasController@deletePrivilege');

//frontend
$app->get('confirm/{id}/{code}', 'UserController@confirm');
