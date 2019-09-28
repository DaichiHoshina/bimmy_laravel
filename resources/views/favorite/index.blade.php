@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h3>いいね投稿一覧</h3>
        @foreach($posts as $post)
        <div class="posts colmd-offset-4 col-md-5 mx-auto mt-3">
            <div class="row">
                <div class="post">
                    <div class="text">
                        <div class="body user-image">
                            @if ($post->user->image_path)
                                <img src="{{ $post->user->image_path }}">
                            @endif
                            <a href="{{ url('users/' . $post->user->id) }}" class="nav-link">
                                @ {{ $post->user->name }}
                            </a>
                        </div>
                        <div class="date">
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
