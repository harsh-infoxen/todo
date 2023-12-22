<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('/todo', TodoController::class);
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index']);
    Route::put('/todo/{id}/status', [App\Http\Controllers\TodoController::class, 'updateStatus']);

});
