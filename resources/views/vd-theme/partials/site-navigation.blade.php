<div class="container-fluid main-navbar" >
    <div class="col-md-10">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{ asset(env('THEME')) }}/images/vodafone_logo.pg" alt=""></a>
        </div>

        <div class="collapse navbar-collapse nav-item" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Главная <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('site.phonebook') }}">Контакты</a></li>
                <li><a href="{{ route('site.service-codes') }}">Сервис коды</a></li>
                <li><a href="/statistic.php">Статистика</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-2">
        <div class="collapse navbar-collapse nav-item" id="bs-example-navbar-collapse-2">
            {{--<h1 class="clock">{{clock}}</h1>--}}
        </div>
    </div>
</div>