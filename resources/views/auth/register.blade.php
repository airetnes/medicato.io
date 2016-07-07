@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($errors->has('role_id'))
        <div class="alert alert-danger alert-dismissible" id="error-alert" style="margin-top:20px;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>
                {{ $errors->first('role_id') }}
            </p>
        </div>
        @endif

        <h3>Регистрация</h3>

        <form class="well" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name">Фамилия</label>

                <div class="input-group">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ваша фамилия" value="{{ old('last_name') }}">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name">Имя</label>

                <div class="input-group">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ваше имя" value="{{ old('first_name') }}">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>

            <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                <label for="middle_name">Отчество</label>

                <div class="input-group">
                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Ваше отчество" value="{{ old('middle_name') }}">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Эл.почта</label>

                <div class="input-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ваш E-Mail" value="{{ old('email') }}">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                </div>
            </div>

            <div class="form-group">
                <label for="user_phone">Телефон</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Номер телефона" value="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="user_password">Пароль</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Пароль">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="user_password1">Повторите пароль</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="user_password1" name="user_password1" placeholder="Повторите пароль">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-success active">
                        <input type="radio" name="types" id="option1" value="0" autocomplete="off" checked> Пользователь
                    </label>
                    <label class="btn btn-success">
                        <input type="radio" name="types" id="option2" value="1" autocomplete="off"> Специалист
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Зарегистрироваться
            </button>
        </form>


        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Обязательные поля</strong></div>

        <p class="text-center"><a href="?act=login">Назад</a></p>

    </div>



                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="role_id" id="option1" autocomplete="off" value="1">
                                    Пользователь
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="role_id" id="option2" autocomplete="off" value="2">
                                    Специалист
                                </label>
                            </div>
                            @if ($errors->has('role_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                            @endif
                        </div>



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

@endsection
