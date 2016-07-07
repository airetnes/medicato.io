@extends('layouts.master')
@section('title', trans('login.Авторизация'))
@section('content')

    <div class="container">

        <div class="alert alert-danger alert-dismissible" id="error-alert" style="margin-top:20px;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>
            </p>
        </div>

        <div class="alert alert-success alert-dismissible" id="success-alert" style="margin-top:20px;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <h3>{{ trans('login.Авторизация') }}</h3>


        <form method="POST" action="/login/auth" class="well">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="user_email">E-mail</label>
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="E-mail" value="">
            </div>
            <div class="form-group">
                <label for="user_password">Пароль <a href="#">(Забыли пароль?)</a></label>
                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Пароль">
            </div>
            <input type="submit" name="submit_form" class="btn btn-primary" value="Вход">
        </form>


        <p class="text-center"><a href="#">Ещё нет учётной записи?</a></p>

    </div>

@endsection