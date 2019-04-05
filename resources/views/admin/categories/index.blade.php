@extends('layouts.app')
@section('title')
    <title>Улучши свой город - Категории</title>
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
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Все категории <a href="{{route('admin.categories.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a></h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Всего заявок</th>
                    <th>Новых заявок</th>
                    <th>Заявок решено</th>
                    <th>Заявок отклонено</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <th>{{$category->name}}</th>
                        <th>{{$category->issuesCount()}}</th>
                        <th>{{$category->newIssuesCount()}}</th>
                        <th>{{$category->successIssuesCount()}}</th>
                        <th>{{$category->dangerIssuesCount()}}</th>
                        <th>
                            <button type="button" data-toggle="modal" onclick="" data-target="#deleteModal"
                                    class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Удалить
                            </button>
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
                                            <a href="{{route('admin.categories.delete',$category)}}" class="btn btn-danger">Удалить</a>
                                            <button type="button" data-toggle="modal" data-dismiss="modal"
                                                    class="btn btn-default">Отмена
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
