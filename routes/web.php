<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProfileController;



// Route::get('/register', function () {
//     return view('register');
// })->name('register');

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/help', function () {
    return view('help');
})->name('help');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::controller(TaskController::class)->group(function() {
    Route::get('/tasks', 'showTasks')->name('tasks');
    Route::get('/tasks-delete/{id}', 'deleteTask')->name('deletetasks');
    Route::get('/tasks-add', 'addtask')->name('addtask');
    Route::post('/tasks-add', 'storeTask')->name('storetask');
    Route::get('/update-page', 'goToUpdatePage')->name('gotoupdatepage');
    Route::get('/tasks-update/{id}', 'updateTask')->name('updateTask');
    Route::post('/tasks-update/{id}', 'updateSave')->name('updateSave');

});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-save', [UserController::class, 'registerSave'])->name('registerSave');



Route::post('/login-match', [UserController::class, 'login'])->name('loginMatch');
Route::get('/dashboard', [UserController::class, 'dashboardpage'])->name('dashboardpage');


Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
//     Route::post('/profile', [ProfileController::class, 'updateProfile']);
// });
// //
