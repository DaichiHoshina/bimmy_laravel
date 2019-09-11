<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\News;

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

    public function show(Request $request,$id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        return view('users.edit', ['user_form' => $user]);
    }

    public function update(Request $request)
    {
        //$this->validate($request, News::$rules);
        $user = User::find($request->id);
        $user_form = $request->all();
        if (isset($user_form['image'])) {
          $path = $request->file('image')->store('public/image');
          $user->image_path = basename($path);
          unset($user_form['image']);
        } elseif (isset($request->remove)) {
          $user->image_path = null;
          unset($user_form['remove']);
        }
        unset($user_form['_token']);
        \Debugbar::addMessage($user);
        $user->fill($user_form)->save();


        return redirect('users/' . $user->id);
    }


}
