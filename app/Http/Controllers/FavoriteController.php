<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Favorite;
use App\User;
use Storage;

class FavoriteController extends Controller
{
    public function index(Request $request, $id)
    {
        $favorites = Auth::user()->favorites;
        $posts = [];
        foreach($favorites as $f){
          $posts[] = $f->news;
        }
        return view('favorite.index',['posts' => $posts]);
    }

    public function create(Request $request, $id)
    {
        $favorite = new Favorite;
        $favorite->user_id = Auth::id();
        $favorite->news_id = $id;
        unset($favorite['_token']);
        $favorite->save();

        return redirect('news/index');
    }

    public function delete(Request $request, $id)
    {
        $favorite = Favorite::where('news_id', $id)->where('user_id', Auth::id());
        $favorite->delete();

        return redirect('news/index');
    }
}
