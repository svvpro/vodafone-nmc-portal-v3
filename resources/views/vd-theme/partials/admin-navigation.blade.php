<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.index') }}">Центр контроля и управления</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Шаблоны <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.alarm-template.index') }}">Редактор шаблонов</a></li>
                        <li><a href="{{ route('admin.system.index') }}">Редактор систем</a></li>
                        <li><a href="{{ route('admin.category.index') }}">Редактор категорий</a></li>
                        <li><a href="{{ route('admin.alarm-informing-type.index') }}">Редактор типов информирования</a></li>
                        <li><a href="{{ route('admin.alarm-template-type.index') }}">Редактор типов шаблона</a></li>
                        <li><a href="{{ route('admin.alarm-agreement-type.index') }}">Редактор типа согласования</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Контакты <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.departament.index') }}">Редактор отделов</a></li>
                        <li><a href="{{ route('admin.engineer.index') }}">Редактор контактов</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Сервис коды <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.service-code-type.index') }}">Радактор типов сервис кодов</a></li>
                        <li><a href="{{ route('admin.service-code.index') }}">Редактор сервис кодов</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Пользователи <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.user.index') }}">Менеджер пользователей</a></li>
                        <li><a href="{{ route('admin.permission.index') }}">Права доступа</a></li>
                    </ul>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown">{{ Auth::user()->surname.' '.Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>