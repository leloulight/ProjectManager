<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware' => 'oauth'], function() {

    Route::get('client', ['middleware' => 'oauth', 'uses' => 'ClientController@index']);
    Route::get('user/authenticated', 'UserController@authenticated');
    Route::get('client/{id}', 'ClientController@show');
    Route::put('client/{id}', 'ClientController@update');
    Route::delete('client/{id}', 'ClientController@destroy');
    Route::post('client', 'ClientController@store');

    Route::get('project/{projectId}/note', 'ProjectNoteController@index');
    Route::get('project/{projectId}/note/{noteId}', 'ProjectNoteController@show');
    Route::delete('project/{projectId}/note/{noteId}', 'ProjectNoteController@destroy');
    Route::post('project/{projectId}/note/', 'ProjectNoteController@store');


    Route::get('project', 'ProjectController@index');
    Route::get('project/{id}', 'ProjectController@show');
    Route::delete('project/{id}', 'ProjectController@destroy');
    Route::post('project', 'ProjectController@store');

});
