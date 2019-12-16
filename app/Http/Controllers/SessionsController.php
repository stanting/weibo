<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

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

        if (Auth::attempt($credentials, $request->has('remember'))) {
            if (Auth::user()->activated) {
                session()->flash('success', 'Welcom back.');
                $fallback = route('users.show', Auth::user()->id);
                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('warning', 'Your account is not activated, please check the activation email to activate.');
                return redirect('/');
            }
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
