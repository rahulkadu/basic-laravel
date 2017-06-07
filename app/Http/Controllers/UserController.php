<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function dashboard()
    // {
    //     // $user = auth()->user();
    //     // $user = $user->toArray();

    //     return view('user.dashboard');
    // }

    public function profile()
    {
        $user = auth()->user();
        // $user = $user->toArray();

        if($user->role_id == 1)
            $role = 'ADMIN';
        else
            $role = 'USER';
        
        return view('user.profile')->with('user', $user)->with('role', $role);
    }


    public function addUser()
    {
        $user = auth()->user();
        if ($user->role_id != 1) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }
        
        return view('user.add');
    }

    public function postAddUser()
    {
        $user = auth()->user();
        if ($user->role_id != 1) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $this->validate(request(), [
            'password'  => 'required|min:8',
            'password_confirmation'  => 'required|same:password',
            'email'  => 'required|regex:/^[a-zA-Z0-9-._]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/|max:50',
        ],['email.regex' => 'Please enter a valid emailid',
            'password_confirmation.same' =>'The PASSWORD and CONFIRM PASSWORD must match.',
        ]);

        $email_check = User::where('email', '=', request('email'))->first();
        if ($email_check !== null) {

            return back()->withErrors([
                'message' => 'Email address already exists.'
            ]);
        }

        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role_id' => 2
        ]);

        session()->flash('alert-success', 'User added successfully.');
        return redirect()->route('user.list');
    }

    public function userList()
    {
        $user = auth()->user();
        if ($user->role_id != 1) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $users = User::where("role_id", "!=", 1)->orderBy('created_at', 'desc')->paginate(5);

        $index = $users->perPage() * ($users->currentPage()-1) + 1;

        // dd($users);

        $users_count = User::where("role_id", "!=", 1)->count();

        return view('user.list')->with('users', $users)->with('users_count', $users_count)->with('index', $index);
    }
}
