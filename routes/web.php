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

Route::get('/', 'App\Http\Controllers\Tasks\TaskController@index')->name('tasks.index');

Route::group(['prefix' => 'task'], function() 
{
    Route::post('/fetch-data', 'App\Http\Controllers\Tasks\TaskController@fetch_data')->name('tasks.fetch-data');

    Route::get('/create', 'App\Http\Controllers\Tasks\TaskController@create')->name('tasks.create');

    Route::post('/store', 'App\Http\Controllers\Tasks\TaskController@store')->name('tasks.store');

    Route::get('/{id}/edit', 'App\Http\Controllers\Tasks\TaskController@edit')->name('tasks.edit');

    Route::patch('/update/{id}', 'App\Http\Controllers\Tasks\TaskController@update')->name('tasks.update');

    Route::post('/ready-task/{id}', 'App\Http\Controllers\Tasks\TaskController@readyTask')->name('tasks.ready-task');

    Route::Delete('/delete/{id}', 'App\Http\Controllers\Tasks\TaskController@destroy')->name('tasks.delete');
});
