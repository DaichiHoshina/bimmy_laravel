<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Favorite;
use App\User;

class FavoriteController extends Controller
{
    public function create(Request $request)
    {
        $favorite = new Favorite;
        $favorite->user_id = Auth::id();
        $favorite->news_id = 2;
        //dd($favorite);
        $favorite->save();

        return view('news.index');
    }
}
