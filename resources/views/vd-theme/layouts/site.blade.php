<!DOCTYPE html>
<html lang="en" ng-app="nmc-portal">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NMC-Portal v3</title>

    <!-- Bootstrap -->
    <link href="{{ asset(env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset(env('THEME')) }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset(env('THEME')) }}/css/site.css" rel="stylesheet">


    <!-- Angular -->
    <script src="{{ asset(env('THEME')) }}/js/bower_components/angular/angular.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body ng-controller="SiteController">

<div class="container">
    @include(env('THEME').'.partials.site-navigation')

    {{--<h2>{{ $title }}</h2>--}}

    @yield('content')


    <div class="col-md-12 navbar-footer-info">
        <h4>Центр контроля и управления</h4>
        <p>NMC Portal ver.3.0.0b</p>
    </div>
</div>

{{--<!--Timer-->--}}
{{--<script src="bower_components/momentjs/min/moment.min.js"></script>--}}
{{--<script src="bower_components/humanize-duration/humanize-duration.js"></script>--}}

{{--<script src="bower_components/angular-timer/dist/angular-timer.js"></script>--}}

{{--<!--Angular-filter-->--}}
{{--<script src="bower_components/angular-filter/dist/angular-filter.min.js"></script>--}}

{{--<!--    Multiselect-->--}}
{{--<script src="bower_components/oi.select/dist/select-tpls.min.js"></script>--}}
{{--<!--Date-Time picker-->--}}
{{--<script src="bower_components/angular-ui-bootstrap-datetimepicker/datetimepicker.js"></script>--}}
{{--<script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>--}}
{{--<!--Angular Animate-->--}}
{{--<script src="bower_components/angular-animate/angular-animate.js"></script>--}}
{{--<!--    TextAngulal-->--}}
{{--<script src='bower_components/textAngular/dist/textAngular-rangy.min.js'></script>--}}
{{--<script src='bower_components/textAngular/dist/textAngular-sanitize.min.js'></script>--}}
{{--<script src='bower_components/textAngular/dist/textAngular.min.js'></script>--}}

{{--<!--    JS library moment-->--}}
{{--<script src="bower_components/moment/moment.js"></script>--}}
{{--<script src="bower_components/momentjs/min/locales.min.js"></script>--}}
{{--<script src="bower_components/moment-timezone/builds/moment-timezone-with-data-2010-2020.js"></script>--}}
{{--<!--    Pagination-->--}}
{{--<script src="bower_components/angularUtils-pagination/dirPagination.js"></script>--}}

{{--<script src="bower_components/jquery/dist/jquery.js"></script>--}}
{{--<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>--}}
{{--<!--    Application sctipts-->--}}
<script src="{{ asset(env('THEME')) }}/js/angular/modules/module.js"></script>
<script src="{{ asset(env('THEME')) }}/js/angular/controllers/SiteController.js"></script>
<script src="{{ asset(env('THEME')) }}/js/angular/controllers/ServiceCodePageController.js"></script>
<script src="{{ asset(env('THEME')) }}/js/angular/controllers/PhonebookPageController.js"></script>
{{--<script src="js/controllers/base_controller.js"></script>--}}
{{--<script src="js/directives/directives.js"></script>--}}
{{--<!--Charts-->--}}
{{--<script type="text/javascript" src="js/lib/fusioncharts.js"></script>--}}
{{--<script type="text/javascript" src="js/lib/fusioncharts.charts.js"></script>--}}
{{--<script type="text/javascript" src="js/lib/angular-fusioncharts.min.js"></script>--}}
{{--<!--NgClipboard-->--}}
{{--<script src="bower_components/clipboard/dist/clipboard.min.js"></script>--}}
{{--<script src="bower_components/ngclipboard/dist/ngclipboard.min.js"></script>--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset(env('THEME')) }}/js/bootstrap.min.js"></script>
</body>
</html>

