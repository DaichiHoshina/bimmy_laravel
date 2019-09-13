<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\User;
use App\Favorite;
use Storage;

class NewsController extends Controller
{
    public function add()
    {
        return view('news.create');
    }

    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        return view('news.index', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $this->validate($request, News::$rules);
        $news = new News;
        $user = User::find(Auth::id());
        $news->user_id = $user->id;
        $form = $request->all();
        if (isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            $news->image_path = Storage::disk('s3')->url($path);
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
