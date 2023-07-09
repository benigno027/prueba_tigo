<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Tasks\GetTasks;
use App\Http\Controllers\API\Tasks\StoreTasks;
use App\Http\Controllers\API\Tasks\DeleteTasks;
use App\Http\Controllers\API\Tasks\UpdateTasks;
use App\Http\Controllers\API\Tasks\ReadyTasks;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// API v1
Route::prefix('v1')->group(function () {

    Route::group(['prefix' => 'tasks'], function () {

        Route::get('/', GetTasks::class)->name('api.tasks');

        Route::post('/store', StoreTasks::class)->name('api.tasks.store');

        Route::post('/update/{id}', UpdateTasks::class)->name('api.tasks.update');

        Route::post('/ready-task/{id}', ReadyTasks::class)->name('api.tasks.ready-task');
        
        Route::Delete('/delete/{id}', DeleteTasks::class)->name('api.tasks.delete');

    });

});