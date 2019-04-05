<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/style.css")}}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Городской портал</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/">Главная</a></li>
                    @guest()
                        <li><a href="{{route('register')}}">Зарегистрироваться</a></li>
                        <li><a href="{{route('login')}}">Войти</a></li>
                    @endguest
                    @auth()
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                {{ Auth::user()->shortName() }}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->isAdmin)
                                    <li><a href="{{route('admin.index')}}">Все заявки</a></li>
                                    <li><a href="{{route('issues.new')}}">Новая заявка</a></li>
                                    <li><a href="{{route('admin.categories.index')}}">Все категории</a></li>
                                    <li><a href="{{route('admin.categories.create')}}">Добавить категорию</a></li>
                                @else
                                    <li><a href="{{route('home')}}">Мои заявки</a></li>
                                    <li><a href="{{route('issues.new')}}">Новая заявка</a></li>
                                @endif
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('logout')}}">Выход</a>
                            </ul>
                        </li>
                    @endauth

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("js/bootstrap.js")}}"></script>
@yield('script','')
</body>
</html>
