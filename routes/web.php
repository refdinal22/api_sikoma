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
    $router->get('mahasiswa/proposal/ongoing', 'MahasiswaController@onGoingProposal');
    $router->get('mahasiswa/proposal/finished', 'MahasiswaController@finishedProposal');
    $router->get('mahasiswa/proposal/report', 'MahasiswaController@getReport');

    $router->post('mahasiswa/proposal', 'MahasiswaController@proposal');
    $router->post('mahasiswa/team', 'MahasiswaController@team');

    //Review
    $router->get('reviewer/proposal/ongoing', 'ReviewerController@onGoingProposals');
    $router->get('reviewer/proposal/finished', 'ReviewerController@finishedProposals');    
    $router->post('reviewer/proposal', 'ReviewerController@ReviewProposal');

    //Jurusan
    $router->get('departments', 'DepartmentController@getAll');

    //Kompetisi
    $router->get('competitions', 'CompetitionController@getAll');
    $router->post('competitions', 'CompetitionController@addCompetition');


    
});
