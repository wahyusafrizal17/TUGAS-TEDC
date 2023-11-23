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

$router->group(['prefix' => 'karyawan'], function () use ($router) {
    $router->get('/', ['uses' => 'KaryawanController@index']);
    $router->get('/detail', ['uses' => 'KaryawanController@show']);
    $router->post('/store', ['uses' => 'KaryawanController@store']);
    $router->put('update', ['uses' => 'KaryawanController@update']);
    $router->delete('delete', ['uses' => 'KaryawanController@destroy']);
});

$router->group(['prefix' => 'projek'], function () use ($router) {
    $router->get('/', ['uses' => 'ProjekController@index']);
    $router->get('/detail', ['uses' => 'ProjekController@show']);
    $router->post('/store', ['uses' => 'ProjekController@store']);
    $router->put('update', ['uses' => 'ProjekController@update']);
    $router->delete('delete', ['uses' => 'ProjekController@destroy']);
});

$router->group(['prefix' => 'assign-projek'], function () use ($router) {
    $router->get('/', ['uses' => 'AssignProjekController@index']);
    $router->get('/detail', ['uses' => 'AssignProjekController@show']);
    $router->post('/store', ['uses' => 'AssignProjekController@store']);
    $router->put('update', ['uses' => 'AssignProjekController@update']);
    $router->delete('delete', ['uses' => 'AssignProjekController@destroy']);
});