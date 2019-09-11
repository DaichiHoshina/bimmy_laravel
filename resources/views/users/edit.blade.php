@extends('layouts.app')
@section('title', 'プロフィール編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('UserController@update') }}"
                        method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name"
                            value="{{ $user_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $user_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">プロフィール画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value ="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-10">
                          <input type="hidden" name="id" value="{{ $user_form->id }}">
                          {{ csrf_field() }}
                          <input type="submit" class="btn btn-primary" value="更新">
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
