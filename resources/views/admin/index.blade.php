@extends('layouts.app')
@section('title')
    <title>Улучши свой город</title>
@endsection
@section('content')
    <div class="container">
        <h2>Все заявки</h2>
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
                        <h3 class="text-center"><a href="{{route('issues.show',$issue)}}">{{ $issue->title }}</a><span
                                    class="label label-{{ $issue->getStatusColor() }} status">{{$issue->status}}</span>
                        </h3>
                        <div class="footer">
                            <span>Дата создания: <b>{{ $issue->date() }}</b></span>
                            <span>Время с момента создания: <b>{{ $issue->timer() }}</b></span>
                            <span>Категория: <b>{{ $issue->category->name }}</b></span>
                        </div>
                    </div>

                </div>
            @empty
            @endforelse
        </div>
        <div class="text-center">{{$issues->links()}}</div>
    </div>
@endsection
