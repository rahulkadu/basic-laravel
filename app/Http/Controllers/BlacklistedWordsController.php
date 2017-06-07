<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BlacklistedWords;

class BlacklistedWordsController extends Controller
{
    // public function create()
 //    {
 //     $user = auth()->user();
 //     if ($user->role_id != 1) {
    //      return back()->withErrors([
 //                'message' => 'Unauthorised User.'
 //            ]);
    //     }

    //     // $blacklisted_words = BlacklistedWords::orderBy('created_at', 'asc')->paginate(5);

 //     //    $index = $blacklisted_words->perPage() * ($blacklisted_words->currentPage()-1) + 1;

 //     //    // dd($blacklisted_words);

 //     //    $blacklisted_words_count = BlacklistedWords::count();

 //        return view('blacklisted_words.add');
 //    }

    public function index()
    {
        $user = auth()->user();
        if ($user->role_id != 1) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $blacklisted_words = BlacklistedWords::orderBy('created_at', 'desc')->paginate(5);

        $index = $blacklisted_words->perPage() * ($blacklisted_words->currentPage()-1) + 1;

        // dd($blacklisted_words);

        $blacklisted_words_count = BlacklistedWords::count();

        return view('blacklisted_words.list')->with('blacklisted_words', $blacklisted_words)->with('blacklisted_words_count', $blacklisted_words_count)->with('index', $index);
    }

    public function store()
    {
        $user = auth()->user();
        if ($user->role_id != 1) {
            return back()->withErrors([
                'message' => 'Unauthorised User.'
            ]);
        }

        $this->validate(request(), [
            'word'  => 'required',
        ]);

        $check = BlacklistedWords::where('word', '=', request('word'))->first();
        if ($check !== null) {

            return back()->withErrors([
                'message' => 'This word already exists.'
            ]);
        }

        BlacklistedWords::create([
            'word' => request('word')
        ]);

        session()->flash('alert-success', 'Word added successfully.');
        return redirect()->route('blacklisted.words.list');
    }
}
