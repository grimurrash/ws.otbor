@extends('layouts.app')
@section('title')
    <title>Улучши свой город - {{$issue->title}}</title>
@endsection
@section('content')
    <div class="container justify-content-center">
        <div class="col-sm-6 col-md-8">
            <div class="thumbnail issue">
                <div class="photos">
                    <img src="{{ $issue->startPhotoUrl() }}" alt="{{$issue->start_photo}}">
                    @if(isset($issue->end_photo))
                        <img src="{{ $issue->endPhotoUrl() }}" alt="{{$issue->end_photo}}">
                    @endif
                </div>
                <h3 class="text-center">{{$issue->title}}</h3>
                <hr>
                <p class="desc">{{$issue->desc}}</p>
            </div>
        </div>
    </div>
@endsection
