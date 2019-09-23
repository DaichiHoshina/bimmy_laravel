@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h2>登録者一覧</h2>
          @foreach($users as $user)
            <div class="profile-box pt-3">
                <div class="profile-list row">
                    <div class="user-image mb-2">
                        @if ($user->image_path)
                            <img src="{{ $user->image_path }}">
                        @endif
                    </div>
                    <div class="body">
                        <a href="{{ url('users/' . $user->id) }}" class="nav-link">
                            @ {{ $user->name }}
                        </a>
                    </div>
                </div>
            </div>
          @endforeach
    </div>
@endsection
