@extends('layouts.app')
@section('title')
    <title>Улучши свой город - Регистрация</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="margin-bottom: 30px;"><h1>{{ __('Регистрация') }}</h1></div>
                    <div class="card-body">
                        <form id="form_register" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="fio"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Ф.И.О.') }}</label>
                                <div class="col-md-6">
                                    <input id="fio" type="text"
                                           class="form-control{{ $errors->has('fio') ? ' is-invalid' : '' }}"
                                           name="fio" value="{{ old('fio') }}" autofocus>

                                    @if ($errors->has('fio'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="login"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>
                                <div class="col-md-6">
                                    <input id="login" type="text"
                                           class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}"
                                           name="login" value="{{ old('login') }}" autofocus>

                                    @if ($errors->has('login'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="treatment" id="treatment" {{ old('treatment') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="treatment">
                                            {{ __('Согласие на обработку персональных данных') }}
                                        </label>
                                    </div>
                                    @if ($errors->has('treatment'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('treatment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="register_submit" type="submit" class="btn btn-primary">
                                        {{ __('Зарегистрироваться') }}
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
{{--@section('script')--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('#register_submit').click((e)=>{--}}
                {{--e.preventDefault();--}}
                {{--data = {--}}

                    {{--fio:$('#name').val(),--}}
                    {{--login:$('#login').val(),--}}
                    {{--email: $('#email').val(),--}}
                    {{--password: $('#password').val(),--}}
                    {{--password_confirmation: $('#password-confirm').val()--}}
                {{--};--}}
                {{--$.ajax({--}}
                    {{--url: 'register',--}}
                    {{--method:'post',--}}
                    {{--data: JSON.stringify(data),--}}
                    {{--success:()=>{--}}
                        {{----}}
                    {{--}--}}
                {{--})--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}
