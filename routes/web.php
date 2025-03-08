<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

//jobs
Route::get('/jobs', [JobsController::class, 'index']);
Route::get('/jobs/create', [JobsController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobsController::class, 'store'])->middleware('auth');

Route::get('/jobs/{job}', [JobsController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobsController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobsController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('/jobs/{job}', [JobsController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job');


//auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);


