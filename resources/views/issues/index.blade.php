@extends('layouts.app')
@section('title')
    <title>Улучши свой город - {{$issue->title}}</title>
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
    <div class="container justify-content-center">
        <div class="col-sm-6 col-md-8">
            <div class="thumbnail issue">
                <div class="photos">
                    <img src="{{ $issue->startPhotoUrl() }}" alt="{{$issue->start_photo}}">
                    @if(isset($issue->end_photo))
                        <div id="endPhoto" style="background-image: url({{ $issue->endPhotoUrl() }})">
                            <div class="circle"></div>
                        </div>
                    @endif
                </div>
                <h3 class="text-center">{{$issue->title}}<span
                            class="label label-{{ $issue->getStatusColor() }} status">{{$issue->status}}</span></h3>
                <hr>
                <p class="desc">{{$issue->desc}}</p>
                <hr>
                <div class="info">
                    <span>Дата создания: <b>{{ $issue->date() }}</b></span>
                    <span>Время с момента создания: <b>{{ $issue->timer() }}</b></span>
                    <span>Категория: <b>{{ $issue->category->name }}</b></span>
                </div>
                @if($issue->status == 'Новая')
                    <div class="btn-group btn-group-justified" role="group">
                        @if(Auth::user()->isAdmin)
                            <a href="{{route('admin.success',$issue)}}" class="btn-group">
                                <button type="button" class="btn btn-success">Решено</button>

                            </a>
                            <a href="{{route('admin.danger',$issue)}}" class="btn-group">
                                <button type="button" class="btn btn-danger">Отклонено</button>
                            </a>
                        @endif
                        @if(Auth::user()->id == $issue->user_id)
                            <div class="btn-group">
                                <button type="button" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-danger">Удалить
                                </button>
                            </div>
                        @endif
                    </div>
                    @if(Auth::user()->id == $issue->user_id)
                        <div class="modal fade" id="deleteModal">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>Удаление заявки о проблеме</h3>
                                    </div>
                                    <div class=modal-body>
                                        <p>Вы уверены что хотите удалить заявку</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('issues.delete',$issue)}}"
                                           class="btn btn-danger">Удалить</a>
                                        <button type="button" data-toggle="modal" data-dismiss="modal"
                                                class="btn btn-default">Отмена
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
