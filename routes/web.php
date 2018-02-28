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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::post('tasks', 'TaskController@store')->name('tasks.store');
Route::put('/tasks/{task}', 'TaskController@update')->name('tasks.update');
});