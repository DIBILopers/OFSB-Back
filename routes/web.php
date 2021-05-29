<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'user'], function () use ($router) {
    
    $router->get    ('/data', 'UserController@index');
    $router->get    ('/data/{id}', 'UserController@show');
    $router->post   ('/data', 'UserController@store');
    $router->put    ('/data', 'UserController@update');
    $router->delete('/data/{id}', 'UserController@destroy');
});
$router->group(['prefix' => 'matches'], function () use ($router) {
    
    $router->get    ('/getdata', 'MatchController@index');
    // $router->get    ('/data/{id}', 'MatchController@show');
    $router->post   ('/data', 'MatchController@store');
    $router->post   ('/generate', 'MatchController@generate');
    $router->put    ('/data', 'MatchController@update');
    $router->delete('/data/{id}', 'MatchController@destroy');
});