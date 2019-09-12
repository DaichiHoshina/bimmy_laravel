<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\News;
use App\Favorite;
use Storage;

class UserController extends Controller
{
    public function show(Request $request,$id)
    {
        $user = User::find($id);
        $posts = News::where('user_id', $id )->get();
        return view('users.show', ['user' => $user], ['posts' => $posts]);
    }

    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        return view('users.edit', ['user_form' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user_form = $request->all();
        if (isset($user_form['image'])) {
          $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
          $user->image_path = Storage::disk('s3')->url($path);
        } elseif (isset($request->remove)) {
          $user->image_path = null;
          unset($user_form['remove']);
        }
        unset($user_form['_token']);
        $user->fill($user_form);
        $user->save();

        return redirect('users/' . $user->id);
    }


}
