@extends('../user/layouts.app')
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
                            <h3 class="box-title">Диалоги</h3>

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="{{ $CountNewMessage }} New Messages" class="badge bg-light-blue new_count_message">{{ $CountNewMessage }}</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body direct-chat-contacts-open" style="min-height: 400px">

                            <div class="direct-chat-contacts" style="min-height: 400px">
                                <ul class="contacts-list">
                                    @foreach($messages as $message)
                                        {{--*/ $initial = \App\User::find($message->from) /*--}}
                                        {{--*/ $last_body = \App\Message::where('parent_id', $message->parent_id)->get()->last() /*--}}
                                        <li>
                                            <a href="{{ url('admin/message/'.$message->from) }}">
                                                @if($initial->photo)
                                                    <img src="{{ URL::asset('files/photo/' . $initial->photo) }}" class="contacts-list-img" alt="User Image">
                                                @else
                                                    <img src="{{ URL::asset('files/photo/default.jpg') }}" class="contacts-list-img" alt="User Image">
                                                @endif

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        {{ $initial->last_name }} {{ $initial->first_name }}
                                                        <small class="contacts-list-date pull-right"><time class="timeago" datetime="{{ $last_body->created_at }}">{{ $last_body->created_at }}</time></small>
                                                    </span>
                                                    <span class="contacts-list-msg">{{ ($last_body->from == Auth::user()->id) ? 'Вы: ' . $last_body->body : $last_body->body }}</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                    @endforeach
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contatcts-list -->
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
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


            socket.emit('join_room', {"user_room": user_id.val()});


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