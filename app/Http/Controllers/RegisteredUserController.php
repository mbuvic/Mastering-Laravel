<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        //Validate
        $attributes = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::min(4), 'confirmed']
        ]);

        //Store
        $user = User::create($attributes);

        //Create Session
        Auth::login($user);

        //Send Email
        Mail::to($user)->send(
            new NewUser($user)
        );

        //Redirect
        return redirect('/jobs');
    }
}
