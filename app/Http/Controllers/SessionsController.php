<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Welcom back.');
            return redirect()->route('users.show', Auth::user()->id);
        }

        session()->flash('danger', 'Sorry, incorrect email or password.');
        return redirect()->back()->withInput();
    }

    public function destroy()
    {
        Auth::logout();

        session()->flash('success', 'Logouted.');

        return redirect()->route('login');
    }
}
