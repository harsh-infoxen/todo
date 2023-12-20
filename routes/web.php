<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/user/create', function () {
    return view('user.create');
});

Route::post('/', [StudentController::class, 'store']);
Route::get('/', [StudentController::class, 'index']);
Route::delete('student-delete/{id}', [StudentController::class, 'destroy'])->name('student-delete');
Route::get('student/{id}', [StudentController::class, 'edit'])->name('student-edit');
Route::put('user/{id}', [StudentController::class, 'update'])->name('student-update');

// Route::get('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'login']);



Route::resource('student', StudentController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
