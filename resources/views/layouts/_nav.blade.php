<div class="col-md-12">
    <div class="row">
        <a id="touch-menu" class="mobile-menu" href="{{ url('#') }}"><i class="fa fa-navicon"></i>{{ trans('home.Меню') }}</a>

        <nav id="glavnav" class="signuplight">
            <ul class="menu1">
                <li><a href="{{ url('#') }}"><i class="fa fa-medkit"></i>{{ trans('home.Услуги и стоимость') }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('#') }}">{{ trans('home.Описание МРТ и КТ') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('home.Видеоконсультация') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('home.Экстренная консультация') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('home.Услуги и стоимость') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('#') }}"><i class="fa fa-user-md"></i>{{ trans('home.Врачи') }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('#') }}">{{ trans('home.Клиники-партнеры') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('home.Выбор специалиста') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('home.Лучевая диагностика') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('#') }}"><i class="fa fa-stethoscope"></i>{{ trans('home.Специализации') }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('#') }}">{{ trans('home.Взрослые') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('home.Дети') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('#') }}"><i class="fa fa-map-marker"></i>{{ trans('home.Контакты') }}</a></li>
                <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i>{{ trans('home.Личный кабинет') }}</a></li>

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

            <div class="top_contacts"><i class="fa fa-phone faa-ring animated faa-slow hidden-xs"></i> <a
                        href="tel:+79999999999">+7 (999) 999 9999</a></div>
        </nav>

    </div>
</div>