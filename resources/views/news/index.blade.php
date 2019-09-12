@extends('layouts.app')
@section('content')
    <div class="container">
      @foreach($posts as $post)
        <div class="posts colmd-offset-4 col-md-5 mx-auto mt-3">
            <div class="row">
                <div class="post">
                    <div class="text">
                        <div class="date">
                            ID: {{ $post->id }}
                            {{ $post->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="body">
                            <a href="{{ url('users/' . $post->user->id) }}" class="nav-link">
                              @ {{ $post->user->name }}
                            </a>
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
                        <img src="{{ asset('storage/image/' . $post->image_path) }}">
                        @endif
                    </div>
                    <div class="heart">
                        <form action="{{ url('favorite/create') }}" method="post" class="mt-3">
                        <button type="submit" class="fa fa-heart like-btn"></button>
                        {{ csrf_field() }}
                        </form>
                    </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
@endsection
