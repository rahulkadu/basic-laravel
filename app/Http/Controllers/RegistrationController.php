<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegistrationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function create()
    {
        return view('user.register');
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required|max:40|regex:/^[A-Za-z0-9_.-]+$/',
            'password'  => 'required|min:8|regex:/(^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]+$)+/',
            'password_confirmation'  => 'required|same:password',
            'email'  => 'required|regex:/^[a-zA-Z0-9-._]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/|max:50',
        ],['username.required' => 'Please enter your username',
            'username.regex' =>'Only alphanumeric characters are allowed',
            'password.regex' => 'Password must be a mix of atleast 1 uppercase and lowercase letter, 1 number and 1 special charater',
            'email.regex' => 'Please enter a valid emailid',
        ]);

        $username_check = User::where('username', '=', request('username'))->first();
        if ($username_check !== null) {

            return back()->withErrors([
                'message' => 'Username alerady exists.'
            ]);
        }

        $email_check = User::where('email', '=', request('email'))->first();
        if ($email_check !== null) {

            return back()->withErrors([
                'message' => 'Email address alerady exists.'
            ]);
        }

        do {
            $api_key = str_random(30);
        } while (User::where("apikey", "=", $api_key)->first() instanceof User);

        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'apikey' => $api_key
        ]);

        do {
            $token_key = str_random(25);
        } while (User::where("token", "=", $token_key)->first() instanceof User);

        $user = User::find($user->id);
        // $user->token = str_random(25);
        $user->token = $token_key;
        $user->save();

        \Mail::to($user)->send(new EmailConfirmation($user));

        session()->flash('alert-success', 'You have been registered successfully! Please verify your email to proceed further.');

        return redirect()->route('login');
    }
}
