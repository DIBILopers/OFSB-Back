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
$router->get('print/test', 'PrintController@test');

$router->group(['prefix' => 'user'], function () use ($router) {
    
    $router->get    ('/data', 'UserController@index');
    $router->get    ('/data/{id}', 'UserController@show');
    $router->post   ('/store', 'UserController@store');
    $router->patch    ('/update/{id}', 'UserController@update');
    $router->delete('/data/{id}', 'UserController@destroy');
});

$router->group(['prefix' => 'matches'], function () use ($router) {
    $router->post    ('/record-bet', 'BetController@add');
    $router->get    ('/index', 'BetController@index');

    $router->get    ('/getdata', 'MatchController@index');
    $router->get    ('/current', 'MatchController@get_current');
    $router->get    ('/recent', 'MatchController@get_recent');
    // $router->get    ('/data/{id}', 'MatchController@show');
    $router->post   ('/insert', 'MatchController@store');
    $router->post   ('/generate', 'MatchController@generate');
    
    $router->put    ('/edit-odd/{id}', 'MatchController@edit_odd');
    $router->put   ('/add-bet/{id}', 'MatchController@add_bet');
    $router->put   ('/is-displayed/{id}', 'MatchController@is_displayed');
    $router->put   ('/start-match/{id}', 'MatchController@start_match');
    $router->put    ('/next/{id}', 'MatchController@next_match');
    
    $router->delete('/data/{id}', 'MatchController@destroy');
    $router->delete('/thanos', 'MatchController@thanosx2');
});