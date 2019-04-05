@extends('layouts.app')
@section('title')
    <title>Улучши свой город</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Все заявки</h2>
            </div>
            <div class="col-md-6" style="display: flex; align-items: center;">
                <form action="{{route('admin.index')}}" method="get" style="width: 100%;">
                    @csrf
                    <h3><label for="search">Фильтрация по статусу</label></h3>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <select id="search"
                                    class="form-control"
                                    name="search" autofocus>
                                <option {{ !isset($search) ? 'selected':''}} value="null">Все</option>
                                <option {{ isset($search) && $search == 'Новая' ? 'selected':''}} value="Новая">Новая</option>
                                <option {{ isset($search) && $search == 'Решена' ? 'selected':''}} value="Решена">Решена</option>
                                <option {{ isset($search) && $search == 'Отклонена' ? 'selected':''}} value="Отклонена">Отклонена</option>
                            </select>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button id="register_submit" type="submit" class="btn btn-success">
                                {{ __('Фильтр') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            @forelse($issues as $issue)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail issue">
                        <div class="photos">
                            <a href="{{route('issues.show',$issue)}}" class="thumbnail">
                                <img src="{{ $issue->startPhotoUrl() }}" alt="{{$issue->start_photo}}">
                            </a>
                        </div>
                        <h3 class="text-center"><a href="{{route('issues.show',$issue)}}">{{ $issue->title }}</a></h3>
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
