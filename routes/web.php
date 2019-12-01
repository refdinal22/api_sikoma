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

    $router->get('users', 'UserController@getAll');
    $router->post('user/reset', 'UserController@resetPassword');

    //Pengajuan
    $router->post('ormawa/proposal/update', 'OrmawaController@updateRevision');
    $router->get('ormawa/proposal', 'OrmawaController@getProposal');
    $router->get('ormawa/proposal/ongoing', 'OrmawaController@onGoingProposal');
    $router->get('ormawa/proposal/finished', 'OrmawaController@finishedProposal');
    $router->get('ormawa/proposal/report', 'OrmawaController@getReport');

    $router->get('ormawa/proposal/all', 'OrmawaController@Dashboard');

    $router->post('ormawa/proposal', 'OrmawaController@proposal');
    $router->post('ormawa/team', 'OrmawaController@team');

    //Student
    $router->get('students/', 'StudentController@getAllStudent');
    $router->get('mentors/', 'MentorController@getAllMentor');

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

    //Laporan
    $router->post('admin/report', 'AdminController@report');

});
