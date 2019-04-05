@extends('layouts.app')
@section('title')
    <title>Улучши свой город</title>
@endsection
@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
    </div>
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
        <h2>Статистика портала</h2>
        <br>
        <ul class="list-group col-sm-6 col-md-5">
            <li class="list-group-item">
                <span class="badge">{{$info['user_count']}}</span>
                Всего пользователей
            </li>
            <li class="list-group-item">
                <span class="badge">{{$info['issues_count']}}</span>
                Всего заявок
            </li>
            <li class="list-group-item">
                <span class="badge">{{$info['new_count']}}</span>
                Новых заявок
            </li>
            <li class="list-group-item">
                <span class="badge">{{$info['success_count']}}</span>
                Решенных заявок
            </li>
            <li class="list-group-item">
                <span class="badge">{{$info['danger_count']}}</span>
                Заявок отклонено
            </li>
        </ul>
    </div>
    <div class="container">
        <h2>Последние решенные проблемы</h2>
        <br>
        <div class="row">
            @forelse($issues as $issue)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail issue">
                        <div class="photos">
                            <a href="{{route('issues.show',$issue)}}" class="thumbnail">
                                <img src="{{ $issue->startPhotoUrl() }}" alt="{{$issue->start_photo}}">
                            </a>
                            {{--@if(isset($issue->end_photo))--}}
                            {{--<img src="{{ $issue->endPhotoUrl() }}" alt="{{$issue->end_photo}}">--}}
                            {{--@endif--}}
                        </div>
                        <h3 class="text-center">  <a  href="{{route('issues.show',$issue)}}">{{ $issue->title }}</a></h3>
                        <div class="info">
                            <span>Дата создания: <b>{{ $issue->date() }}</b></span>
                            <span>Время с момента создания: <b>{{ $issue->timer() }}</b></span>
                            <span>Категория: <b>{{ $issue->category->name }}</b></span>
                            <span style="font-size: 16px;" class="label label-{{ $issue->getStatusColor() }} status">{{$issue->status}}
                            </span>
                        </div>
                    </div>

                </div>
            @empty
            @endforelse
        </div>
        <div class="text-center">{{$issues->links()}}</div>
    </div>
@endsection
