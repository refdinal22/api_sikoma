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
    $router->post('mahasiswa/proposal/update', 'MahasiswaController@updateRevision');
    $router->get('mahasiswa/proposal', 'MahasiswaController@getProposal');
    $router->get('mahasiswa/proposal/ongoing', 'MahasiswaController@onGoingProposal');
    $router->get('mahasiswa/proposal/finished', 'MahasiswaController@finishedProposal');
    $router->get('mahasiswa/proposal/report', 'MahasiswaController@getReport');

    $router->get('mahasiswa/proposal/all', 'MahasiswaController@Dashboard');

    $router->post('mahasiswa/proposal', 'MahasiswaController@proposal');
    $router->post('mahasiswa/team', 'MahasiswaController@team');

    //Review
    $router->get('reviewer/proposal/ongoing', 'ReviewerController@onGoingProposals');
    $router->get('reviewer/proposal/revision', 'ReviewerController@revisionProposals');    
    $router->post('reviewer/proposal', 'ReviewerController@ReviewProposal');

    //Jurusan
    $router->get('departments', 'DepartmentController@getAll');

    //Kompetisi
    $router->get('competitions', 'CompetitionController@getAll');
    $router->post('competitions', 'CompetitionController@addCompetition');

    //Mentor
    $router->get('mentor/proposal/ongoing', 'MentorController@onGoingProposal');
    $router->get('mentor/proposal/finished', 'MentorController@finishedProposal');

    //Admin
    $router->get('admin/proposal/new', 'AdminController@newProposal');
    $router->get('admin/proposal/revision', 'AdminController@revisionProposal');
    $router->get('admin/proposal/finished', 'AdminController@finishedProposal');
    $router->get('admin/proposal/rejected', 'AdminController@rejectedProposal');
    $router->get('admin/proposal/reported', 'AdminController@reportedProposal');
    $router->post('admin/proposal/reported', 'AdminController@updateReport');
    $router->post('admin/proposal/revision', 'AdminController@deadlineProposal');

    $router->get('admin/proposal/fund', 'AdminController@fundProposal');
    $router->post('admin/proposal/fund', 'AdminController@updateFund');
    $router->post('admin/proposal/disfund', 'AdminController@updateDisFund');

});
