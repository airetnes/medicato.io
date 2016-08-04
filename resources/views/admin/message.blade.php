@extends('user/layouts.app')
@section('title', trans('user/message.Сообщения'))
<?php $user = Auth::user();?>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('user/message.Сообщения') }}
                <small>{{ $CountNewMessage }} новых сообщений</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('user') }}"><i class="fa fa-dashboard"></i> {{ trans('user/main.Панель управления') }}</a></li>
                <li class="active"><i class="fa fa-envelope"></i> {{ trans('user/message.Сообщения') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary direct-chat direct-chat-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Диалог</h3>

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="{{ $CountNewMessage }} New Messages" class="badge bg-light-blue new_count_message">{{ $CountNewMessage }}</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="direct-chat-messages" style="min-height: 400px">

                                @foreach($messages as $message)
                                    {{--*/ $initial = \App\User::find($message->from) /*--}}
                                    <div class="direct-chat-msg{{ ($message->from != $user->id) ? ' right' : '' }}">
                                        <input type="hidden" id="mess_id" value="{{$message->id}}">
                                        <div class="direct-chat-info clearfix">
                                        <span class="{{ ($message->from != $user->id) ? 'pull-right' : 'pull-left' }}">
                                            <span class="direct-chat-name">{{ $initial->last_name }} {{ $initial->first_name }}</span>
                                            <time class="direct-chat-timestamp timeago" datetime="{{ $message->created_at }}">{{ $message->created_at }}</time>
                                        </span>
                                        </div>
                                        @if($initial->photo)
                                            <img src="{{ URL::asset('files/photo/' . $initial->photo) }}" class="direct-chat-img" alt="User Image">
                                        @else
                                            <img src="{{ URL::asset('files/photo/default.jpg') }}" class="direct-chat-img" alt="User Image">
                                        @endif
                                        <div class="direct-chat-text {{ ($message->from != $user->id) ? 'pull-right' : 'pull-left' }}">
                                            {{ $message->body }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <form action="{{ LaravelLocalization::getLocalizedURL(null,'/user/new_message') }}" method="post" id="form-new_message">
                                {{ csrf_field() }}
                                <input type="hidden" id="user_name" value="{{ $user->last_name . ' ' . $user->first_name }}">
                                <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" id="parent_id" value="{{ $messages[0]->parent_id }}">
                                <div class="input-group">
                                    <input type="text" id="message" name="message" placeholder="Введите сообщение ..." class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat" id="send_message">Отправить</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer-->

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(document).ready(function(){
//            socket.emit('update_count_message', {
//                update_count_message: 4
//            });
//            if ($('#user_id').val() != 1) {
//                socket.emit('login_new_user', {
//                    login_new_user: $('#user_name').val()
//                });
//            }
//
//            socket.on('login_new_user', function (data) {
//                alert(data.login_new_user)
//            });

            $("time.timeago").timeago();

            var chat_box = $(".direct-chat-messages");
            var message = $('#message');
            var user_id = $('#user_id');
            var user_name = $('#user_name');
            var send_btn = $('#send_message');
            var user_role = '{{ Auth::user()->role_id }}';
            var parent_id = $('#parent_id');


            socket.emit('join_room', {"user_room": parent_id.val()});

            chat_box.scrollTop(chat_box.prop('scrollHeight'));

            $( '#form-new_message' ).on( 'submit', function() {

                if (message.val().length > 0) {
                    send_btn.addClass('disabled');

                    $.post(
                            $( this ).prop( 'action' ),
                            {
                                message : message.val(),
                                user_id : user_id.val(),
                                created_at : new Date(),
                                user_name: user_name.val(),
                                user_role: user_role,
                                _token  : '{{ csrf_token() }}'
                            },
                            function( data ) {
                                console.log(data);
                                if (data.status == 'success') {
                                    socket.emit('new_count_message', {
                                        new_count_message: data.new_count_message
                                    });

                                    socket.emit('new_message', {
                                        message: data.message,
                                        user_id: data.user_id,
                                        created_at: data.created_at,
                                        user_role: data.user_role,
                                        user_name: data.user_name
                                    });
                                    message.val('');
                                }
                                send_btn.removeClass('disabled');
                            },
                            'json'
                    );

                    //.....
                    //do anything else you might want to do
                    //.....

                    //prevent the form from actually submitting in browser
                }
                return false;

            } );

            socket.on('new_message', function (data) {
                chat_box.append(
                        '<div class="direct-chat-msg ' + (data.user_id == '{{ $user->id }}' ? '' : 'right') + '">' +
                        '<div class="direct-chat-info clearfix">' +
                        '<span class="'+ (data.user_id == '{{ $user->id }}' ? 'pull-left' : 'pull-right') +'">' +
                        '<span class="direct-chat-name">' + data.user_name + ' </span>' +
                        '<time class="direct-chat-timestamp timeago" datetime="' + $.timeago(data.created_at) + '">' + $.timeago(data.created_at) + '</time>' +
                        '</span>' +
                        '</div>' +
                        '@if($user->photo)' +
                        '<img src="{{ URL::asset('files/photo/' . $user->photo) }}" class="direct-chat-img" alt="User Image">' +
                        '@else' +
                        '<img src="{{ URL::asset('files/photo/default.jpg') }}" class="direct-chat-img" alt="User Image">' +
                        '@endif' +
                        '<div class="direct-chat-text '+ (data.user_id == '{{ $user->id }}' ? 'pull-left' : 'pull-right') +'">' + data.message + '</div>' +
                        '</div>');
                chat_box.scrollTop(chat_box.prop('scrollHeight'));
            })

        } );
    </script>
@endsection