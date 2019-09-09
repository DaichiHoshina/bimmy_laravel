<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('profile.create');
    }

    public function create(Request $request)
    {
        #$this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        return redirect('profile/create');
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
          abort(404);
        }
        return view('profile.edit', ['profile_form' => $profile]);
  }

    public function update(Request $request)
    {

        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        $history = new Profile_history;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('profile/create');
    }

    public function index(Request $request)
    {
        $posts = Profile::all();
        return view('profile.index', ['posts' => $posts]);
    }

    public function show(Request $request)
    {
        $posts = Profile::find($request->id);
        return view('profile.show', ['posts' => $posts]);
    }

}
