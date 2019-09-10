@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>プロフィール</h2>
          @foreach($users as $user)
            <div class="profile-box">
                <div class="profile-list row">
                    <p class="col-md-2">名前:</p>
                    <p class="col-md-10">{{ $user->name }}</p>
                </div>
            </div>
          @endforeach
    </div>
@endsection
