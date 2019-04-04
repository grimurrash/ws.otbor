
@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Привет, дорогой друг!</h1>
            <p>
                Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому мы
                предлагаем тебе помочь своему городу!
            </p>
            <p>
                Увидел проблему? Дай нам знать о ней и мы ее решим!
            </p>
            <p>
                <a class="btn btn-success btn-lg" href="{{route('issues.new')}}" role="button">Сообщить о проблеме</a>
            </p>
        </div>
    </div>
    <div class="container">
        <h2>Мои заявка</h2>

    </div>
@endsection
