<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
  public function add()
  {
      return view('admin.news.create');
  }

  public function create(Request $request)
  {
      $this->validate($request, News::$rules);
      $news = new News;
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

      return redirect('/news');
  }

  public function index(Request $request)
  {
      $cont_title = $request->cond_title;
      if ($cont_title !=''){
          $posts = News::where('title', $cont_title)->get();
      } else {
          $posts = News::all();
      }
      return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cont_title]);
  }

  public function edit(Request $request)
  {
      $news = News::find($request->id);
      if (empty($news)) {
        abort(404);
      }
      return view('admin.news.edit',['news_form' => $news]);
  }

  public function update(Request $request)
  {
      $this->validate($request, News::$rules);
      $news = News::find($request->id);
      $news_form = $request->all();
      if (isset($news_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
        unset($news_form['image']);
      } elseif (isset($request->remove)) {
        $news->image_path = null;
        unset($news_form['remove']);
      }
      unset($news_form['_token']);
      $news->fill($news_form)->save();

      return redirect('admin/news');
  }

  public function delete(Request $request)
  {
      $news = News::find($request->id);
      $news->delete();
      return redirect('admin/news/');
  }
}
