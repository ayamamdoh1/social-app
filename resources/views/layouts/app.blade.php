<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body{margin-top:20px;}

        /*==================================================
          Post Contents CSS
          ==================================================*/

        .post-content{
            background: #f8f8f8;
            border-radius: 4px;
            width: 100%;
            border: 1px solid #f1f2f2;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }

        .post-content img.post-image, video.post-video, .google-maps{
            width: 100%;
            height: auto;
        }

        .post-content .google-maps .map{
            height: 300px;
        }

        .post-content .post-container{
            padding: 20px;
        }

        .post-content .post-container .post-detail{
            margin-left: 65px;
            position: relative;
        }

        .post-content .post-container .post-detail .post-text{
            line-height: 24px;
            margin: 0;
        }

        .post-content .post-container .post-detail .reaction{
            position: absolute;
            right: 0;
            top: 0;
        }

        .post-content .post-container .post-detail .post-comment{
            display: inline-flex;
            margin: 10px auto;
            width: 100%;
        }

        .post-content .post-container .post-detail .post-comment img.profile-photo-sm{
            margin-right: 10px;
        }

        .post-content .post-container .post-detail .post-comment .form-control{
            height: 30px;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            margin: 7px 0;
            min-width: 0;
        }

        img.profile-photo-md {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        img.profile-photo-sm {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .text-green {
            color: #8dc63f;
        }

        .text-red {
            color: #ef4136;
        }

        .following {
            color: #8dc63f;
            font-size: 12px;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
