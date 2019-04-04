@extends('layouts.app')
@section('title')
    <title>Улучши свой город - Регистрация</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header" style="margin-bottom: 30px;"><h1>{{ __('Создание заявки') }}</h1></div>
                    <div class="card-body">
                        <form id="form_register" enctype="multipart/form-data" method="POST" action="{{ route('issues.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           name="title" value="{{ old('title') }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desc"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                <div class="col-md-6">
                                    <input id="desc" type="text"
                                           class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}"
                                           name="desc" value="{{ old('desc') }}" autofocus>

                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Категория') }}</label>

                                <div class="col-md-6">
                                    <select id="category"
                                            class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                            name="category_id">
                                        @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Изображение') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file"
                                           class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('desc') }}"

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="register_submit" type="submit" class="btn btn-primary">
                                        {{ __('Отправить проблему на расмотрение') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
