<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        if (request('title') == 'test') {
            return redirect()->back()->withErrors(['title' => 'Title cannot be test'])->withInput();
        }        
        
        // Fetch employer associated with the logged-in user
        $employer = Employer::where('user_id', Auth::user()->id)->first();
        
        if (!$employer) {
            // Handle the error (for example, redirect back with an error message)
            return redirect()->back()->withErrors(['title' => 'Employer record not found.'])->withInput();
        }
    
        $job = Job::create([
            'employer_id' => $employer->id,
            'slug'        => str()->slug(request('title')),
            'title'       => request('title'),
            'location'    => request('location'),
            'salary'      => request('salary'),
        ]);

        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );
    
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
