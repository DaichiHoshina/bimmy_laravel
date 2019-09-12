@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h2>プロフィール</h2>
        <div class="profile-box">
            <div class="profile-list row">
                <p class="col-md-2">名前:</p>
                <p class="col-md-10">{{ $user->name }}</p>
                <p class="col-md-2">自己紹介:</p>
                <p class="col-md-10">{{ $user->introduction }}</p>
                <div class="profile-image col-md-6 mt-4">
                    @if ($user->image_path)
                    <img src="{{ asset('storage/image/' . $user->image_path) }}">
                    @endif
                </div>
                <div class="col-sm-offset-4 col-sm-8">
                    @if ($user->id == Auth::id() )
                    <a href="{{ url('users/' .$user->id. '/edit') }}" class="btn btn-primary">
                      プロフィール編集
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
