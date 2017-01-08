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
$app->get('api/products', 'ProductController@index');
$app->get('api/products/{id}', 'ProductController@get');
$app->put('api/products/{id}', 'ProductController@update');
$app->delete('api/products/{id}', 'ProductController@delete');
$app->post('api/products', 'ProductController@create');

//productimage
$app->get('api/products/{pid}/images', 'ProductImageController@index');
$app->get('api/products/{pid}/images/{id}', 'ProductImageController@get');
$app->post('api/products/{pid}/images', 'ProductImageController@create');
$app->delete('api/products/{pid}/images/{id}', 'ProductImageController@delete');

//has
$app->get('api/has', 'HasController@index');
$app->get('api/has/{id}', 'HasController@getPrivilegesForUser');
$app->post('api/has', 'HasController@createPrivilege');
$app->delete('api/has/{id}/{privilege}', 'HasController@deletePrivilege');

//category
$app->get('api/category', 'CategoryController@index');
$app->get('api/category/{id}', 'CategoryController@getCategory');
$app->put('api/category/{id}', 'CategoryController@updateCategory');
$app->delete('api/category/{id}', 'CategoryController@deleteCategory');
$app->post('api/category', 'CategoryController@createCategory');

//privilege
$app->get('api/privilege', 'PrivilegeController@index');
$app->get('api/privilege/{id}', 'PrivilegeController@getPrivilege');
$app->put('api/privilege/{id}', 'PrivilegeController@updatePrivilege');
$app->delete('api/privilege/{id}', 'PrivilegeController@deletePrivilege');
$app->post('api/privilege', 'PrivilegeController@createPrivilege');

//order
$app->get('api/order', 'OrderController@index');
$app->get('api/order/{id}', 'OrderController@getOrder');
$app->put('api/order/{id}', 'OrderController@updateOrder');
$app->delete('api/order/{id}', 'OrderController@deleteOrder');
$app->post('api/order', 'OrderController@createOrder');

//search
$app->get('api/search/user', 'SearchController@searchUser');
$app->get('api/search/product', 'SearchController@searchProduct');

//frontend
$app->get('confirm/{id}/{code}', 'UserController@confirm');