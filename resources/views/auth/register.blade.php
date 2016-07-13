@extends('layouts.app')

@section('content')

    <div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible" id="error-alert" style="margin-top:20px;" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </div>
        @endif

        <h3>Регистрация</h3>

        <form class="well" role="form" method="POST" action="{{ LaravelLocalization::getLocalizedURL(null,'/register') }}">
            {{ csrf_field() }}

            {{--'password' => 'required|min:6|confirmed',--}}
            {{--'role_id' => 'required|integer|digits_between:1,2'--}}

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name">Фамилия</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ваша фамилия" value="{{ old('last_name') }}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name">Имя</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ваше имя" value="{{ old('first_name') }}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                        <label for="middle_name">Отчество</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Ваше отчество" value="{{ old('middle_name') }}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Эл.почта</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ваш E-Mail" value="{{ old('email') }}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Пароль</label>

                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation">Повторите пароль</label>

                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-success {{ (old('role_id') == 1) ? 'active' : '' }}">
                        <input type="radio" name="role_id" id="option1" value="1" autocomplete="off" {{ (old('role_id') == 1) ? 'checked' : '' }}><i class="fa fa-btn fa-user"></i> Пользователь
                    </label>
                    <label class="btn btn-success {{ (old('role_id') == 2) ? 'active' : '' }}">
                        <input type="radio" name="role_id" id="option2" value="2" autocomplete="off" {{ (old('role_id') == 2) ? 'checked' : '' }}><i class="fa fa-btn fa-user-md"></i> Специалист
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">
                Зарегистрироваться
            </button>
        </form>


        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Обязательные поля</strong></div>

        <p class="text-center"><a href="{{ url('login') }}">Назад</a></p>

    </div>



                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{----}}
                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password">--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

                                {{--@if ($errors->has('password_confirmation'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}

@endsection
