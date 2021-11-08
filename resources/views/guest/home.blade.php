<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid m-0 p-0">
            <div class="row">
                <div class="col-12">
                    <header id="jumbo">
                        <div class="nav-right">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <a href="{{ url('/admin') }}">Home</a>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
    
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
    
                        </div>
                        <div class="content">
                            <h1>My blog</h1>
                            <a href="{{ route('posts.index') }}">Posts</a>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </body>
</html>

{{-- <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/admin') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <h1>My blog</h1>
        <a href="{{ route('posts.index') }}">Posts</a>
    </div>
</div> --}}