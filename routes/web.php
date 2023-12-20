<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

// Route::resource('todos', \App\Http\Controllers\TodoController::class);
// Route::get('todos/{todo}', [\App\Http\Controllers\TodoController::class,'destroy'])->name('todos.destory');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('dashboard', \App\Http\Controllers\TodoController::class);
    Route::get('dashboard/{todo}', [\App\Http\Controllers\TodoController::class,'destroy'])->name('dashboard.destory');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::resource('todos', \App\Http\Controllers\TodoController::class);
Route::get('todos/{todo}', [\App\Http\Controllers\TodoController::class,'destroy'])->name('todos.destory');

require __DIR__.'/auth.php';

