<?php

use Illuminate\Support\Facades\Route;


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


// Project routes
Route::get('/project/{project}', '\App\Http\Controllers\ProjectController@index')->name('project.home');
Route::get('/', '\App\Http\Controllers\ProjectController@create')->name('project.create');
Route::post('/', '\App\Http\Controllers\ProjectController@store');

//tasks route
Route::get('/project/{project}/task-create', '\App\Http\Controllers\TaskController@create')->name('task.create');
Route::post('/project/{project}/task-create', '\App\Http\Controllers\TaskController@store');
Route::get('/project/{project}/task/{task}/edit', '\App\Http\Controllers\TaskController@edit')->name('task.edit');
Route::put('/project/{project}/task/{task}/edit', '\App\Http\Controllers\TaskController@update')->name('task.update');
