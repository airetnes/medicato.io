<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://news.kaznmu.kz/eng/wp-content/uploads/2015/01/IMG-20150120-WA0048-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->last_name }} {{ $user->first_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('user/left_nav.Поиск') }}">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('user/left_nav.Меню') }}</li>
            <li class="active">
                <a href="{{ url('#') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ trans('user/left_nav.Панель управления') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ url('#') }}">
                    <i class="fa fa-envelope-o"></i> <span>{{ trans('user/left_nav.Сообщения') }}</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card"></i>
                    <span>{{ trans('user/left_nav.Платежи') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i> {{ trans('user/left_nav.История') }}</a></li>
                    <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i> {{ trans('user/left_nav.К оплате') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{ trans('user/left_nav.Мои консультации') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i> {{ trans('user/left_nav.Текущие') }}</a></li>
                    <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i> {{ trans('user/left_nav.Завершенные') }}</a></li>
                </ul>
            </li>

            <li class="header">{{ trans('user/left_nav.Настройки') }}</li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>{{ trans('user/left_nav.Профиль') }}</span></a></li>
            <li><a href="{{ url('logout') }}"><i class="fa fa-circle-o text-red"></i> <span>{{ trans('user/left_nav.Выход') }}</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>