@extends('layouts.app')
@section('content')
    <div class="container">
        <hr color="#c0c0c0">
            <div class="row">
                <div class="posts col-md-8 mx-auto mt-3">
                      <div class="post">
                          <div class="row">
                              <div class="text col-md-6">
                                  <div class="date">
                                      <li>{{ $profile->user_id }}</li>
                                  </div>
                              </div>
                              <div class="image col-md-6 text-right mt-4">
                                  @if ($user->image_path)
                                  <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                  @endif
                              </div>
                          </div>
                      </div>
                  <hr color="#c0c0c0">
              </div>
          </div>
    </div>
@endsection
