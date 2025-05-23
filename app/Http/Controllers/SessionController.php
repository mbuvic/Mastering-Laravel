<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        if (Auth::guest()) {
            return view('auth.login');
        } else {
            return redirect('/');
        }
    }

    public function store() {
        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt login
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, Your provided credentials did not match our records'
            ]);
        }

        //regenerate session token
        request()->session()->regenerate();

        //redirect
        return redirect('/jobs');

    }

    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
