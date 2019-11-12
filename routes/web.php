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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// API route group
$router->group(['prefix' => 'api'], function () use ($router) {    

    //Autentikasi
    $router->post('register', 'AuthController@register');     
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'UserController@logout');
    $router->get('profile', 'UserController@profile');

    //Pengajuan
    $router->post('mahasiswa/proposal', 'MahasiswaController@proposal');
    $router->post('mahasiswa/team', 'MahasiswaController@team');

    //Jurusan
    $router->get('departments', 'DepartmentController@getAll');

    //Kompetisi
    $router->get('competitions', 'CompetitionController@getAll');


    
});
