<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('user.login');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required',
            'password'  => 'required',
        ],['email.required' => 'Email or Username field required.',
            'password.required' =>'Password field required.',
        ]);


        if (!auth()->attempt(array('email' => request('email'), 'password' => request('password')))) {

            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        session()->flash('alert-success','Successfully logged in.');
        return redirect()->route('profile');
    }

    public function destroy()
    {
        auth()->logout();
        
        session()->flash('alert-success','Successfully logged out.');
        return redirect()->route('login');
    }
}
