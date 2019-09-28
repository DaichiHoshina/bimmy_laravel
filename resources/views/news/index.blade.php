@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($posts as $post)
        <div class="posts colmd-offset-4 col-md-5 mx-auto mt-4">
            <div class="row">
                <div class="post">
                    <div class="text">
                        <div class="user-image mb-2">
                            @if ($post->user->image_path)
                                <img src="{{ $post->user->image_path }}">
                            @endif
                            <div class="body">
                                <a href="{{ url('users/' . $post->user->id) }}" class="nav-link">
                                  @ {{ $post->user->name }}
                                </a>
                            </div>
                        </div>
                        <div class="date mb-2">
                            {{ $post->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="title">
                            {{ str_limit($post->title, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ str_limit($post->body, 1500) }}
                        </div>
                    </div>
                    <div class="image">
                        @if ($post->image_path)
                            <img src="{{ $post->image_path }}">
                        @endif
                    </div>
                    @if(Auth::check())
                        @if (!$post->favorites->pluck("user_id")->contains(Auth::user()->id) )
                        <div class="heart">
                            <form action="{{ url('favorite/' . $post->id . '/create') }}" method="post" class="mt-3">
                            <button type="submit" class="fa fa-heart like-btn">
                              {{ $post->favorites->count() }}</button>
                            {{ csrf_field() }}
                            </form>
                        </div>
                        @else
                        <div class="heart">
                            <form action="{{ url('favorite/' . $post->id . '/delete') }}" method="post" class="mt-3">
                            <button type="submit" class="fa fa-heart unlike-btn">
                              {{ $post->favorites->count() }}</button>
                            {{ csrf_field() }}
                            </form>
                        </div>
                        <h5></h5>
                        @endif
                    @endif
              </div>
          </div>
      </div>
      @endforeach
  </div>
@endsection
