@extends('user/layouts.app')
@section('title', trans('user/main.Панель управления'))
<?php $user = Auth::user(); ?>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('user/main.Панель управления') }}
                {{--<small>it all starts here</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> {{ trans('user/main.Панель управления') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name }}</h3>
                    <h5 class="widget-user-desc">{{ (new \App\User())->getRoleName($user->role_id) }} </h5>
                </div>
                <div class="widget-user-image">
                    @if($user->photo)
                        <img src="{{ URL::asset('files/photo/' . $user->photo) }}" class="img-circle" alt="User Image">
                    @else
                        <img src="{{ URL::asset('files/photo/default.jpg') }}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">0</h5>
                                <span class="description-text">Текущих консультаций</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <a href="{{ url('user/profile') }}" class="btn btn-primary">Редактировать профиль</a>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">0</h5>
                                <span class="description-text">Завершенных консультаций</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <!-- Default box -->
{{--            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    Start creating your amazing application!
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>--}}
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection