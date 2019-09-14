<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'app') }}</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
        </script>

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />
    </head>
    <body>
        <div id="app">
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
              <div class="container">
                  <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'app') }}
                  </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                <a href="{{ url('news/index') }}" class="nav-link">
                                  投稿一覧
                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                    </li>
                                @endif
                                @else
                                <li>
                                    <a href="{{ url('news/create') }}" class="nav-link">
                                      投稿作成
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('favorite/' . Auth::id() . '/index') }}" class="nav-link">
                                      いいね投稿一覧
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('users/' . Auth::id()) }}" class="nav-link">
                                      プロフィール
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('ログアウト') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                {{--フラッシュメッセージ--}}
                               @if(session('success_msg'))
                                   <div class="container mt-2 flash-msg">
                                       <div class="alert alert-success">
                                           {{ session('success_msg') }}
                                       </div>
                                   </div>
                               @elseif(session('alert_msg'))
                                   <div class="container mt-2 flash-msg">
                                       <div class="alert alert-danger">
                                           {{ session('alert_msg') }}
                                       </div>
                                   </div>
                               @endif
            </nav>
            <main>
                @yield('content')
            </main>
        </div>

        <main @if(!Request::is('/')) class="py-4"@endif>
            @yield('content')
        </main>
    </body>
    <footer id="footer" class="bg-light flex-column justify-content-center py-4">
        <p>© 2019 DAICHI HOSHINA All Rights Reserved.</p>
    </footer>
</html>
