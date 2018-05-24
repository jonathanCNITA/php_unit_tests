<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Project;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectController@index');

Route::get('project/create', 'ProjectController@create')->middleware('auth');

Route::post('/store', 'ProjectController@store');

Route::get('project/show/{id}', 'ProjectController@show')->name('ficheProjet');

Route::get('project/edit/{id}', 'ProjectController@edit');

Route::post('project/update/{id}', 'ProjectController@update');

Route::get('/donate', function() {
    return view('donate');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


