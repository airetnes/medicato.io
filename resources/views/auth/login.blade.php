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
                    <form class="well" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Запомнить меня
                                </label>
                                <p class="help-block">(это мой компьютер)</p>
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
                    <p class="lead">Register now for <span class="text-success">FREE</span></p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> See all your orders</li>
                        <li><span class="fa fa-check text-success"></span> Shipping is always free</li>
                        <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                        <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                        <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                        <li><span class="fa fa-check text-success"></span>Holiday discounts up to 30% off</li>
                    </ul>
                    <p><a href="{{ url('/register') }}" class="btn btn-info btn-block">Yes please, register now!</a></p>
                </div>
            </div>

    </div>
@endsection
