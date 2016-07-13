<div class="col-md-12">
    <div class="row">
        <a id="touch-menu" class="mobile-menu" href="{{ url('#') }}"><i class="fa fa-navicon"></i>{{ trans('nav.Меню') }}</a>

        <nav id="glavnav" class="signuplight">
            <ul class="menu1">
                <li><a href="{{ url('#') }}"><i class="fa fa-medkit"></i>{{ trans('nav.Услуги и стоимость') }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('#') }}">{{ trans('nav.Описание МРТ и КТ') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('nav.Видеоконсультация') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('nav.Экстренная консультация') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('nav.Услуги и стоимость') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('#') }}"><i class="fa fa-user-md"></i>{{ trans('nav.Врачи') }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('#') }}">{{ trans('nav.Клиники-партнеры') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('nav.Выбор специалиста') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('nav.Лучевая диагностика') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('#') }}"><i class="fa fa-stethoscope"></i>{{ trans('nav.Специализации') }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('#') }}">{{ trans('nav.Взрослые') }}</a></li>
                        <li><a href="{{ url('#') }}">{{ trans('nav.Дети') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('#') }}"><i class="fa fa-map-marker"></i>{{ trans('nav.Контакты') }}</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i>{{ trans('nav.Личный кабинет') }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span>
                            </a>

                            <ul class="sub-menu" role="menu">
                                <li><a href="{{ url('/#') }}"><i class="fa fa-btn fa-tachometer"></i>{{ trans('nav.Панель управления') }}</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ trans('nav.Выход') }}</a></li>
                            </ul>
                        </li>
                    @endif

            </ul>

            <div class="top_contacts"><i class="fa fa-phone faa-ring animated faa-slow hidden-xs"></i> <a
                        href="tel:+79999999999">+7 (999) 999 9999</a></div>
        </nav>

    </div>
</div>