@extends('layouts.app')
@section('title')
    <title>Улучши свой город</title>
@endsection
@section('content')
    <div class="container">
        @if (isset($message)))
            <div class="alert alert-success" role="alert">
                {{ $message }}
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
        <h2>Последние решенные проблемы</h2>
        <br>
        <div class="row">
            @forelse($issues as $issue)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail issue">
                        <div class="photos">
                            <img src="{{ $issue->startPhotoUrl() }}" alt="{{$issue->start_photo}}">
                            @if(isset($issue->end_photo))
                                <img src="{{ $issue->endPhotoUrl() }}" alt="{{$issue->end_photo}}">
                            @endif
                        </div>
                        <h3 class="text-center"><a href="{{route('issues.show',$issue)}}">{{ $issue->title }}</a><span
                                    class="label label-{{ $issue->getStatusColor() }} status">{{$issue->status}}</span>
                        </h3>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        {{$issues->links()}}
    </div>
@endsection
