@extends('layouts.app')
@section('title')
    <title>Улучши свой город - Отклонение заявки</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header" style="margin-bottom: 30px;"><h1>{{ __('Отклонить проблему') }}</h1></div>
                    <div class="card-body">
                        <form id="form_register" enctype="multipart/form-data" method="POST"
                              action="{{ route('admin.danger.update',$issue) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="desc"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Причина отклонения') }}</label>
                                <div class="col-md-6">
                                  <textarea id="desc" type="text"
                                            class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}"
                                            name="desc" autofocus>{{ old('desc') }}</textarea>

                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="register_submit" type="submit" class="btn btn-primary">
                                        {{ __('Отклонить заявку') }}
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
