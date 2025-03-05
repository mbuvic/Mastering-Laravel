<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index() {
        $jobs = job::with('employer')->latest()->paginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function store() {       
        request()->validate([
            'title' => ['required', 'min:3'],
            'location' => ['required'],
            'salary' => ['required', 'min:3'],
        ]);
    
        Job::create([
            'employer_id' => 301,
            'slug' => str()->slug(request('title')),
            'title' => request('title'),
            'location' => request('location'),
            'salary' => request('salary'),
        ]);
    
        return redirect('/jobs');
    }

    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job) {
        request()->validate([
            'title' => ['required', 'min:3'],
            'location' => ['required'],
            'salary' => ['required', 'min:3'],
        ]);
    
        $job->update([
            'slug' => str()->slug(request('title')),
            'title' => request('title'),
            'location' => request('location'),
            'salary' => request('salary'),
        ]);
    
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}
