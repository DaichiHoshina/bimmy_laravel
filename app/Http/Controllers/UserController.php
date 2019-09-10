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
}
