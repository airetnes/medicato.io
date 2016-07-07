<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Medicato</title>

    <link rel="stylesheet" href="{{URL::asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-grid-3.3.1.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/media.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/css/fonts.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome-animation.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/flag-icon.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script type="text/javascript" src="{{URL::asset('assets/js/modernizr.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<header class="top_header">
    <div class="header_topline">
        <div class="container">
            <div class="col-md-12">
                <div class="row">

                    <div class="top_links">
                        <a href="{{ url('/') }}" class="logo">Medicato</a>
                    </div>

                    <div class="top_links hidden-xs" style="padding: 13px 0px;">
                        <b>{{ trans('home.Дай возможность сказать спасибо. Дай жизнь.') }}</b>
                    </div>

                    {{--<ul class="language_bar_chooser">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>--}}

                    <div class="soc_buttons">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <?php $flag = ($localeCode == 'en') ? 'um' : $localeCode; ?>
                            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                <span class="flag-icon flag-icon-{{$flag}} flag-icon-background"></span>
                            </a>
                        @endforeach
                        {{--<a href="#" target="_blank"><i class="fa fa-vk"></i></a>--}}
                        {{--<a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>--}}
                        {{--<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @include('layouts._nav')
    </div>
</header>

    @yield('content')
<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
    @endif
</ul>
<div class="container footer">
    <div class="row">
        <div class="col-md-4 col-sm-4 text-muted">
            <p><a href="/" class="logo" style="color:#333;">Medicato</a></p>
            <p>
                © ООО «Рога и Копыта» 2016
                Используя данный вебсайт, вы&nbsp;подтверждаете согласие с
                <a href="#">правилами использования</a>.
            </p>
        </div>

        <div class="col-md-2 col-sm-4">
            <div class="signuplight">
                <h4 class="text-muted">Medicato</h4>
                <ul>
                    <li><a href="#">Личный кабинет</a></li>
                    <li><a href="#">Услуги и стоимость</a></li>
                    <li><a href="#">Специализации</a></li>
                    <li><a href="#">Врачи</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-2 col-sm-4">
            <div>
                <h4 class="text-muted">О компании</h4>
                <ul>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Договора</a></li>
                    <li><a href="#">Отзывы</a></li>
                    <li><a href="#">Оферта</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-2 col-sm-4">
            <div>
                <h4 class="text-muted">Помощь</h4>
                <ul>
                    <li><a href="#">Безопасность платежей</a></li>
                    <li><a href="#">Инфо для клиента</a></li>
                    <li><a href="#">Задать вопрос</a></li>
                    <li><a href="#">Правила</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-2 col-sm-4 hidden-md hidden-lg">
            <div>
                <h4 class="text-muted">Контакты</h4>
                <ul>
                    <li>город Кемерово</li>
                    <li>пр. Ленина 19б/2</li>
                    <li><a href="#">+7 (999) 999 9999</a></li>
                    <li><a href="mailto:qwerty@qwerty.ru">qwerty@qwerty.ru</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-2 col-sm-4">
            <div>
                <h4 class="text-muted">Присоединяйся</h4>
                <div class="soc_buttons">
                    <a href="#" target="_blank"><i class="fa fa-vk"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-muted">
        <div class="col-md-9">
            <span>Мы принимаем к оплате</span>
            <img src="{{URL::asset('assets/img/visa.png')}}" alt="Visa footer">
            <img src="{{URL::asset('assets/img/mastercard.png')}}" alt="Master card footer">
        </div>
        <div class="col-md-3 copyright">
            <span>Разработка сайта <a href="http://best-designs.ru">best-designs.ru</a></span>
        </div>
    </div>

</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{URL::asset('assets/js/main-navigation.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/main.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover({
            trigger: 'hover',
            placement: 'bottom'
        })
    })
</script>
</body>
</html>
