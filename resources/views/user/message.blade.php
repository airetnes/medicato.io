@extends('user/layouts.app')
@section('title', trans('user/message.Сообщения'))
<?php $user = Auth::user(); ?>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('user/message.Сообщения') }}
                <small>13 новых сообщений</small>
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
                                <span data-toggle="tooltip" title="3 New Messages" id="new_count_message" class="badge bg-light-blue">{{ $CountNewMessage }}</span>
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
                                <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
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

            socket.on( 'update_count_message', function( data ) {
                $( "#new_count_message" ).html( data.update_count_message );
            });

            $("time.timeago").timeago();

            var chat_box = $(".direct-chat-messages");
            var message = $('#message');
            var user_id = $('#user_id');
            var send_btn = $('#send_message');

            // сюда буду записывать id последнего сообщения
            var mid = $('.direct-chat-messages .direct-chat-msg:last-child input#mess_id').val();

            chat_box.scrollTop(chat_box.prop('scrollHeight'));


            chat_box.everyTime(5000, 'refresh', function() {
                get_message_chat();
            });

            $( '#form-new_message' ).on( 'submit', function() {

                if (message.val().length > 0) {
                    send_btn.addClass('disabled');

                    $.post(
                            $( this ).prop( 'action' ),
                            {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "message": message.val(),
                                "user_id": user_id.val()
                            },
                            function( data ) {
                                if (data.status == 'success') {
                                    get_message_chat();
                                    setTimeout(function () {
                                        chat_box.scrollTop(chat_box.prop('scrollHeight'));
                                    }, 1);
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

            function get_message_chat() {
                console.log(mid);
                $.ajaxSetup({url: "{{ LaravelLocalization::getLocalizedURL(null,'/user/get_message_chat') }}",global: true,type: "GET",data: "event=get&id="+mid+"&t="+(new Date).getTime()});
                $.ajax({
                    success: function(msg_j){
                        if(msg_j.length > 2){
                            var obj = JSON.parse(msg_j);
                            for(var i=0; i < obj.length; i ++){
                                mid = obj[i].id;
                                console.log('id = ' + '{{ $user->id }}' + 'from = ' + obj[i].from);
                                console.log('{{ $user->id }}' == obj[i].from);
                                chat_box.append(
                                        '<div class="direct-chat-msg ' + (obj[i].from == '{{ $user->id }}' ? '' : 'right') + '">' +
                                        '<input type="hidden" id="mess_id" value="' + obj[i].id + '">' +
                                        '<div class="direct-chat-info clearfix">' +
                                        '<span class="'+ (obj[i].from == '{{ $user->id }}' ? 'pull-left' : 'pull-right') +'">' +
                                        '<span class="direct-chat-name">{{ $user->last_name }} {{ $user->first_name }} </span>' +
                                        '<time class="direct-chat-timestamp timeago" datetime="' + $.timeago(obj[i].created_at) + '">' + $.timeago(obj[i].created_at) + '</time>' +
                                        '</span>' +
                                        '</div>' +
                                        '@if($user->photo)' +
                                        '<img src="{{ URL::asset('files/photo/' . $user->photo) }}" class="direct-chat-img" alt="User Image">' +
                                        '@else' +
                                        '<img src="{{ URL::asset('files/photo/default.jpg') }}" class="direct-chat-img" alt="User Image">' +
                                        '@endif' +
                                        '<div class="direct-chat-text '+ (obj[i].from == '{{ $user->id }}' ? 'pull-left' : 'pull-right') +'">' + obj[i].body + '</div>' +
                                        '</div>');
                            }
                            chat_box.scrollTop(chat_box.prop('scrollHeight'));
                        }
                    }
                });
            }

        } );
    </script>
@endsection