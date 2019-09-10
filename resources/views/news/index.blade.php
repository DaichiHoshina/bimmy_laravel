@extends('layouts.app')
@section('content')
    <div class="container">
        <hr color="#c0c0c0">
            <div class="row">
                <div class="posts col-md-8 mx-auto mt-3">
                    @foreach($posts as $post)
                      <div class="post">
                          <div class="row">
                              <div class="text col-md-6">
                                  <div class="date">
                                      {{ $post->updated_at->format('Y年m月d日') }}
                                  </div>
                                  <div class="body">
                                      <a href="{{ url('users/' . $post->user->id) }}" class="nav-link">
                                          {{ $post->user->name }}
                                      </a>
                                  </div>
                                  <div class="title">
                                      {{ str_limit($post->title, 150) }}
                                  </div>
                                  <div class="body mt-3">
                                      {{ str_limit($post->body, 1500) }}
                                  </div>
                              </div>
                              <div class="image col-md-6 text-right mt-4">
                                  @if ($post->image_path)
                                  <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                    @endif
                              </div>
                          </div>
                      </div>
                  <hr color="#c0c0c0">
                  @endforeach
                </div>
          </div>
    </div>
@endsection
