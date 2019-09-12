<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function add()
    {
        return view('news.create');
    }

    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        //$post_count = News::withCount('favorite')->get();
        return view('news.index', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $this->validate($request, News::$rules);
        $news = new News;
        $user = User::find(Auth::id());
        $news->user_id = $user->id;
        $form = $request->all();

        if ($form['image']) {
          $path = $request->file('image')->store('public/image');
          $news->image_path = basename($path);
        } else {
          $news->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        $news->fill($form);
        $news->save();

        return redirect('news/index');
    }
}
