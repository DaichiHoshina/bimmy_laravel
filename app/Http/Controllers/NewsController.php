<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $ports = News::all()->sortByDesc('updated_at');
        return view('news.index', ['posts' => $ports]);
    }
}
