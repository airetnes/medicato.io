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

        <h3>Авторизация</h3>

            <div class="row">
                <div class="col-md-8">
                    <form class="well" role="form" method="POST" action="{{ LaravelLocalization::getLocalizedURL(null,'/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Запомнить меня
                                </label>
                                <p class="help-block">(я доверяю этому компьютеру)</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Вход
                            </button>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
                        </div>
                    </form>
                </div>
                <div class="col-xs-4">
                    <p class="lead">Зарегистрируйтесь сейчас <span class="text-success">БЕСПЛАТНО</span></p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-sliders text-success"></span> Управляйте услугами</li>
                        <li><span class="fa fa-bar-chart text-success"></span> Просмотр баланса</li>
                        <li><span class="fa fa-credit-card text-success"></span> Пополнение счета</li>
                        <li><span class="fa fa-clock-o text-success"></span> Доступ круглосуточно</li>
                        <li><span class="fa fa-envelope-o text-success"></span> Будьте вкурсе <small>(с вашего согласия)</small></li>
                        <li><span class="fa fa-cogs text-success"></span> Индивидуальные настройки сервисов</li>
                    </ul>
                    <p><a href="{{ url('/register') }}" class="btn btn-info btn-block">Зарегистрироваться сейчас!</a></p>
                </div>
            </div>

    </div>
@endsection
