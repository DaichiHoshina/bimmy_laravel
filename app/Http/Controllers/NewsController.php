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

        if (count($ports) > 0) {
            $headline = $ports->shift();
        } else {
            $headline = null;
        }
        return view('news.index', ['headline' => $headline,
        'posts' => $ports]);
    }
}
