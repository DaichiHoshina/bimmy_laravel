@extends('layouts.app')
@section('content')
<div class="top-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-offset-1 col-md-10">
                <div class="top-message text-center">
                    <h4>全国の「おいしいもの」を投稿するサイトです<br><br>
                        みんなで「BiMMy!(美味ぃ!)」を共有しましょう
                    </h4>
                    @if(!Auth::check())
                    <div class='login'>
                        <a class="btn btn-primary" href="{{ route('login') }}">
                          {{ __('ログイン') }}</a>
                        <a class="btn btn-success" href="{{ route('register') }}">
                          {{ __('新規登録') }}</a>
                    </div>
                    <div class='test-login'>
                        <form action="{{ route('login') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="email" value="test@test.jp">
                        <input type="hidden" name="password" value="test@test.jp">
                        <button type="submit" class="btn btn-warning">テストユーザーでログイン</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
