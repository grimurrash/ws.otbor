@extends('layouts.app')
@section('title')
    <title>Улучши свой город</title>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Привет, дорогой друг!</h1>
            <p>
                Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому
                мы
                предлагаем тебе помочь своему городу!
            </p>
            <p>
                Увидел проблему? Дай нам знать о ней и мы ее решим!
            </p>
            <p>
                <a class="btn btn-success btn-lg" href="{{route('issues.new')}}" role="button">Сообщить о проблеме</a>
                @guest()
                    <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">Присоедениться к
                        проекту</a>
                @endguest
            </p>
        </div>
    </div>
    <div class="container">
        <h2>Последние решенные проблемы</h2>
        <br>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/solve2.png" alt="Яма на дороге">
                    <img src="img/problem2.png" alt="Яма на дороге">
                </div>
            </div>
        </div>
    </div>
@endsection
