@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">

        <h3>Восстановление пароля</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="well" role="form" method="POST" action="{{ LaravelLocalization::getLocalizedURL(null,'/password/email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="user_email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ваш E-mail" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-envelope"></i> Отправить ссылку для восстановления пароля
            </button>
        </form>

        <p class="text-center"><a href="{{ url('login') }}">Назад</a></p>

    </div>
@endsection
