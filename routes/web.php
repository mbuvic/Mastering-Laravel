<?php

use Illuminate\Support\Facades\Route;
use App\Models\job;

Route::get('/', function () {

    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/{sjob}', function ($sjob) {

    $sjob = job::find($sjob);

    return view('job', ['job' => $sjob]);
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => job::all()]);
});
