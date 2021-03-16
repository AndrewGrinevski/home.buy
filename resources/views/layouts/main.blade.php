<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7"><![endif]-->
<!--[if IE 8]>
<html class="ie ie8"><![endif]-->
<!--[if IE 9]>
<html class="ie ie9"><![endif]-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('main/images/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('main/images/favicon.png') }}" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">

    <title>Сайт недвижимости</title>
    <!-- Fonts-->

    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/ps-icon/style.css') }}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{ asset('main/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/slick/slick/slick.css') }}">
 {{--   <link rel="stylesheet" href="{{ asset('main/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('main/plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('main/plugins/revolution/css/navigation.css') }}">
    <!-- Custom-->
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="{{ asset('css/preview.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<!--[if IE 7]>
<body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]>
<body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]>
<body class="ie9 lt-ie10"><![endif]-->
<body class="ps-loading">
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>460 West 34th Street, 15th floor, New York - Hotline: 804-377-3580 - 804-399-3580</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    @role('admin')
                        <div class="header__actions"><a href="{{ route('dashboard') }}">Админ</a></div>
                    @endrole
                    @guest
                        <div class="header__actions"><a href="{{ route('login') }}">Login & Regiser</a></div>
                    @endguest
                    @auth()
                        <div class="header__actions"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Get logout</a></div>
                            <div class="header__actions"> <a href="{{ route('home', ['id' =>auth()->id()]) }}">Home</a></div>
                        <div class="header__actions">
                            <p> {{ Auth::user()->name }}&emsp;</p>
                        </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    @endauth
                </div>

            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="{{ route('mainPage') }}"><img
                            src="{{ asset('main/images/logo_domovita.svg') }}" alt=""></a>
                </div>
            </div>
            <div class="navigation__column center">
                <ul class="main-menu menu">
                    @role('user')
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Добавить</a>
                        <div class="mega-menu">
                            <div class="mega-wrap">
                                <div class="mega-column">
                                    <ul class="mega-item">
                                        <li><h2 style="color: #0b0b0b"> Продажа </h2></li>
                                        <li><a href="{{ route('home.addSellFlat.create') }}">Квартиры</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <ul class="mega-item">
                                        <li><h2 style="color: #0b0b0b"> Аренда </h2></li>
                                        <li><a href="{{ route('home.addRentApartment.create') }}">Квартиры на сутки</a></li>
                                        <li><a href="{{ route('home.addRentFlat.create') }}">Квартиры</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endrole
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="{{ route('main.allFlats') }}">Продажа</a>
                        <div class="mega-menu">
                            <div class="mega-wrap">
                                <div class="mega-column">
                                    <ul class="mega-item">
                                        <li><a href="{{ route('main.allFlats') }}"><h3> Квартиры </h3></a></li>
                                        <li><a href="{{ route('main.showOneRoomFlats') }}">1-комнатные</a></li>
                                        <li><a href="{{ route('main.showTwoRoomFlats') }}">2-комнатные</a></li>
                                        <li><a href="{{ route('main.showThreeRoomFlats') }}">3-комнатные</a></li>
                                        <li><a href="{{ route('main.showFourPlusRoomFlats') }}">4-комнатные и более</a>
                                        <li><a href="#">Недорогие квартиры</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="{{ route('main.allRentFlats') }}">Аренда</a>
                        <div class="mega-menu">
                            <div class="mega-wrap">
                                <div class="mega-column">
                                    <ul class="mega-item">
                                        <li><a href="{{ route('main.allRentFlats') }}"><h3>Квартиры</h3></a></li>
                                        <li><a href="{{ route('main.showRentOneRoomFlats') }}">1-комнатные</a></li>
                                        <li><a href="{{ route('main.showRentTwoRoomFlats') }}">2-комнатные</a></li>
                                        <li><a href="{{ route('main.showRentThreeRoomFlats') }}">3-комнатные</a></li>
                                        <li><a href="{{ route('main.showRentFourPlusRoomFlats') }}">4-комнатные и более</a></li>
                                        <li><a href="#">Недорогие квартиры</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                <ul class="mega-item">
                                    <li><a href="{{ route('main.allRentApartments') }}"><h3>На сутки</h3></a></li>
                                    <li><a href="{{ route('main.showRentOneRoomApartments') }}">1-комнатные</a></li>
                                    <li><a href="{{ route('main.showRentTwoRoomApartments') }}">2-комнатные</a></li>
                                    <li><a href="{{ route('main.showRentThreeRoomApartments') }}">3-комнатные</a></li>
                                    <li><a href="{{ route('main.showRentFourPlusRoomApartments') }}">4-комнатные и более</a></li>
                                    <li><a href="#">Недорогие квартиры</a></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="#">Новости</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-has-children dropdown"><a href="blog-grid.html">Blog-grid</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="blog-grid.html">Blog Grid 1</a></li>
                                    <li class="menu-item"><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="blog-list.html">Blog List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </nav>
</header>
<main class="ps-main" id="app">
    @yield('content')
    <div class="ps-footer__copyright">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">Project TeachMeSkills </a>, Inc. All rights Resevered. Design by <a href="#"> Andrew
                            Studio</a></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- JS Library-->

<script type="text/javascript" src="{{ asset('main/plugins/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/plugins/gmap3.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('main/plugins/imagesloaded.pkgd.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('main/plugins/isotope.pkgd.min.js') }}"></script>--}}
<script type="text/javascript"
        src="{{ asset('main/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('main/plugins/jquery.matchHeight-min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('main/plugins/slick/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
{{--<script type="text/javascript"
        src="{{ asset('main/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('main/plugins/jquery-ui/jquery-ui.min.js') }}"></script>--}}
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
<script type="text/javascript" src="{{ asset('main/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
{{--<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>--}}
{{--<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>--}}
{{--<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('main/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>--}}
<!-- Custom scripts-->
<script type="text/javascript" src="{{ asset('main/js/main.js') }}"></script>
</body>
</html>
