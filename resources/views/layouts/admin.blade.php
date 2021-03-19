<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{ asset('admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="{{ route('dashboard') }}">
                <b class="logo-abbr"><img src="{{ asset('admin/images/logo.png') }}" alt=""> </b>
                <span class="logo-compact"><img src="{{ asset('admin/images/logo-compact.png') }}" alt=""></span>
                <span class="brand-title">
                        <h3 style="color: whitesmoke">Админка</h3>
                    </span>
            </a>
        </div>
    </div>

    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header" >
        <div class="float-right">
            <a class="btn btn-dark" href="{{ route('mainPage') }}">На сайт</a>
        </div><br>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Доп. парам. помещения</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.addParam.town.index') }}">Населенный <пункт></пункт></a></li>
                        <li><a href="{{ route('admin.addParam.room.index') }}">Кол-во комнат</a></li>
                        <li><a href="{{ route('admin.addParam.separatedRoom.index') }}">Кол-во отдельных комнат</a></li>
                        <li><a href="{{ route('admin.addParam.berth.index') }}">Кол-во спальных мест</a></li>
                        <li><a href="{{ route('admin.addParam.balcony.index') }}">Тип балкона</a></li>
                        <li><a href="{{ route('admin.addParam.bathroom.index') }}">Сан. узел</a></li>
                        <li><a href="{{ route('admin.addParam.repair.index') }}">Вид ремонта</a></li>
                        <li><a href="{{ route('admin.addParam.wall.index') }}">Тип стен здания</a></li>
                        <li><a href="{{ route('admin.addParam.transaction.index') }}">Условия сделки</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.showUsers.index') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i><span class="nav-text">Пользователи</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.addRole.index') }}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i><span class="nav-text">Роли</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
@yield('content')
<!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by Andrew Grinewski 2021
            </p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('admin/plugins/common/common.min.js') }}"></script>
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<script src="{{ asset('admin/js/settings.js') }}"></script>
<script src="{{ asset('admin/js/gleek.js') }}"></script>
<script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>
<!-- Chartjs -->
<script src="{{ asset('admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Circle progress -->
<script src="{{ asset('admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
<!-- Datamap -->
<script src="{{ asset('admin/plugins/d3v3/index.js') }}"></script>
<script src="{{ asset('admin/plugins/topojson/topojson.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datamaps/datamaps.world.min.js') }}"></script>
<!-- Morrisjs -->
<script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
<!-- Pignose Calender -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
<!-- ChartistJS -->
<script src="{{ asset('admin/plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>


<script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>
</body>

</html>
