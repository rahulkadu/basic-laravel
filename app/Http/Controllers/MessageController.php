<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;
use App\User;
use App\BlacklistedWords;

class MessageController extends Controller
{
    public function inbox()
    {
        $user = auth()->user();
        if ($user->role_id != 2) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $messages = Message::where('to_user', '=', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        // dd($messages[0]->user_data()->first()->email);

        $index = $messages->perPage() * ($messages->currentPage()-1) + 1;

        $messages_count = Message::where('to_user', '=', $user->id)->count();

        return view('messages.inbox')->with('messages', $messages)->with('messages_count', $messages_count)->with('index', $index);
    }

    public function outbox()
    {
        $user = auth()->user();
        if ($user->role_id != 2) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $messages = Message::where('from_user', '=', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        // dd($messages[0]->user_data()->first()->email);

        $index = $messages->perPage() * ($messages->currentPage()-1) + 1;

        $messages_count = Message::where('from_user', '=', $user->id)->count();

        return view('messages.outbox')->with('messages', $messages)->with('messages_count', $messages_count)->with('index', $index);
    }

    public function send()
    {
        $user = auth()->user();
        if ($user->role_id != 2) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $users_list = User::where([
            ['id', '!=', $user->id],
            ['role_id', '=', 2]
        ])->get();

        return view('messages.send')->with('users_list', $users_list);
    }

    public function postSend()
    {
        $user = auth()->user();
        if ($user->role_id != 2) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $this->validate(request(), [
            'to'  => 'required',
            'message'  => 'required',
        ],['to.required' => 'Please select User',
            'message.required' =>'Message field required.',
        ]);

        $message = request()->message;

        $words = BlacklistedWords::get();
        foreach ($words as $word) {

            if (strpos(strtolower($message), strtolower($word->word)) !== false) {
                
                return back()->withErrors([
                    'message' => 'Your message contains blacklisted word.'
                ]);
            }
        }

        Message::create([
            'from_user' => $user->id,
            'to_user' => request()->to,
            'message' => $message,
        ]);

        session()->flash('alert-success', 'Message sent successfully.');
        return redirect()->route('outbox.list');
    }
}
