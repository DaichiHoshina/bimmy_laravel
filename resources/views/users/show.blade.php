@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h3>プロフィール</h3>
        <div class="profile-box">
            <div class="profile-list row">
                <p class="col-md-2">名前:</p>
                <p class="col-md-10">{{ $user->name }}</p>
                <p class="col-md-2">自己紹介:</p>
                <p class="col-md-10">{{ $user->introduction }}</p>
                <div class="profile-image col-md-6 mt-4">
                    @if ($user->image_path)
                     <img src="{{ $user->image_path }}">
                    @endif
                </div>
                <div class="col-sm-offset-4 col-sm-8">
                    @if ($user->id == Auth::id() )
                    <a href="{{ url('users/' .$user->id. '/edit') }}" class="btn btn-primary mb-4">
                      プロフィール編集
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <h3>{{ $user->name }}さんの投稿一覧</h3>
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
                             <img src="{{ $post->image_path }}">
                            @endif
                        </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>

    </div>
@endsection
