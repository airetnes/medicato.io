@extends('user/layouts.app')
@section('title', trans('user/profile.Редактировать профиль'))
<?php $user = Auth::user(); ?>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('user/profile.Редактировать профиль') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('user') }}"><i class="fa fa-dashboard"></i> {{ trans('user/main.Панель управления') }}</a></li>
                <li class="active"><i class="fa fa-user"></i> {{ trans('user/profile.Редактировать профиль') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" id="error-alert" style="margin-top:20px;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <?php Session::get('success'); ?>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" id="success-alert" style="margin-top:20px;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>{!! Session::get('success') !!}</p>
                </div>
            @endif
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ LaravelLocalization::getLocalizedURL(null,'/user/edit_profile') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ваша фамилия" value="{{ $user->last_name }}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ваше имя" value="{{ $user->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Отчество</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Ваше отчество" value="{{ $user->middle_name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Эл.почта</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ваш E-Mail" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Повторите пароль</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль">
                        </div>

                        <div class="form-group">
                            <label for="photo">File input</label>
                            <input type="file" id="photo" name="photo">

                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </div>
                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection