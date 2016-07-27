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

            <div class="row">
                <div class="col-md-8">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Основное</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ LaravelLocalization::getLocalizedURL(null,'/user/edit_profile') }}">
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

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Фото</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body text-center">
                            @if($user->photo)
                                <img src="{{ URL::asset('files/photo/' . $user->photo) }}" class="img-circle" style="width: 160px; height: 160px;" alt="User Image">
                            @else
                                <img src="{{ URL::asset('files/photo/default.jpg') }}" class="img-circle" alt="User Image">
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer {{ ($user->photo) ? '' : 'text-center' }}">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".change-photo-modal">
                                {{ ($user->photo) ? 'Изменить' : 'Загрузить фотографию' }}
                            </button>
                            @if($user->photo)
                                <a href="{{ url('user/delete_photo') }}" class="btn btn-danger pull-right">Удалить фото</a>
                            @endif
                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Пароль</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ LaravelLocalization::getLocalizedURL(null,'/user/edit_password') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="password">Текущий пароль</label>
                                    <input type="password" class="form-control" id="password" name="old_password" placeholder="Текущий пароль">
                                </div>
                                <div class="form-group">
                                    <label for="password">Новый пароль</label>
                                    <input type="password" class="form-control" id="password" name="new_password" placeholder="Новый пароль">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Повторите пароль</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="new_password_confirmation" placeholder="Повторите пароль">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info">Изменить</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

                {{--change-photo-modal--}}
                <div class="modal fade change-photo-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Загрузка новой фотографии</h4>
                            </div>
                            <!-- form start -->
                            <form role="form" method="POST" enctype="multipart/form-data" action="{{ LaravelLocalization::getLocalizedURL(null,'/user/change_photo') }}">
                                <div class="modal-body">
                                    <p>Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
                                    {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input type="file" id="photo" name="photo">
                                        </div>
                                    </div>
                                    <p class="help-block">Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <script src="{{ URL::asset('assets/user/js/cropper.js') }}"></script>
    <link href="{{ URL::asset('assets/user/css/cropper.css') }}" rel="stylesheet" type="text/css"/>

    <script>

    </script>
@endsection