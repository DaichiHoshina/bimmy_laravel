<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::id() === 1) {
        $users = User::all();
        return view('users.index', ['users' => $users]);
        }
        return redirect('/')->with('alert_msg', '不正アクセスです');
    }

    public function show(User $user)
    {
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();
        return view('users.show');
    }
}
