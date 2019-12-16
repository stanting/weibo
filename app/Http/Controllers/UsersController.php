<?php

namespace App\Http\Controllers;

use Auth;
Use Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail']
        ]);
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = 'Thank you for registering the Weibo app, please confirm your email.';

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('users.show', compact('user', 'statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $this->sendEmailConfirmationTo($user);
        session()->flash('success', 'The email has been sent, please check.');
        return redirect('/');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [
            'name' => $request->name
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        session()->flash('success', 'Profile update completed.');

        return redirect()->route('users.show', $user->id);
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);

        $user->delete();

        session()->flash('success', 'Delete successful!');

        return back();
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', 'Congratulations, activation succeeded!');
        return redirect()->route('users.show', $user);
    }
}
