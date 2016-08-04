<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Medicato</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{URL::asset('assets/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{URL::asset('assets/user/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::asset('assets/user/css/skins/_all-skins.min.css')}}">

    <!-- jQuery 2.2.3 -->
    <script src="{{URL::asset('assets/user/js/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{URL::asset('assets/user/js/bootstrap.min.js')}}"></script>

    {{--timeago--}}
    <script type="text/javascript" src="{{URL::asset('assets/user/js/jquery.timeago.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/user/js/jquery.timeago.ru.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/user/js/jquery.timers.js')}}"></script>
    {!! Html::script('node_modules/socket.io-client/socket.io.js') !!}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<script>
    var socket = io.connect( 'http://'+window.location.hostname+':3000' );
</script>
<div class="wrapper">
    <!-- top navigation -->
    @include('user/layouts._top_nav')
    <!-- /top navigation -->

    <!-- left navigation -->
    @include('user/layouts._left_nav')
    <!-- /left navigation -->

    <!-- page content -->
    @yield('content')
    <!-- /page content -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.5
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- control sidebar -->
    @include('user/layouts._control_sidebar')
    <!-- /control sidebar -->

    <div class="control-sidebar-bg"></div>
</div>
<script>
    socket.on('new_count_message', function (data) {
        console.log('new_count_message: ' + data.new_count_message);
        $( ".new_count_message" ).html( data.new_count_message );
    });

    socket.on('update_count_message', function( data ) {
        console.log('update_count_message: ' + data.update_count_message);
        $( ".new_count_message" ).html( data.update_count_message );
    });
</script>
<!-- SlimScroll -->
<script src="{{URL::asset('assets/user/js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('assets/user/js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('assets/user/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('assets/user/js/demo.js')}}"></script>
</body>
</html>