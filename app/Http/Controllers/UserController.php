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
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        $posts = News::where('user_id', $id)->get();
        return view('users.show', ['user' => $user], ['posts' => $posts]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        return view('users.edit', ['user_form' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $form = $request->all();
        if (isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            $user->image_path = Storage::disk('s3')->url($path);
        } else {
            $user->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        $user->fill($form);
        $user->save();

        return redirect('users/' . $user->id);
    }
}
