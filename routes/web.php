<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {

    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {

    // $jobs = Job::all();
    $jobs = job::with('employer')->latest()->paginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

Route::get('/jobs/create', function () {

    return view('jobs.create');
});

Route::post('/jobs', function () {
    // Validation ...

    Job::create([
        'employer_id' => 301,
        'slug' => str()->slug(request('title')),
        'title' => request('title'),
        'location' => request('location'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/{sjob}', function ($sjob) {

    $sjob = job::find($sjob);

    return view('jobs.show', ['job' => $sjob]);
});
