<!DOCTYPE html>
<html style="" class=" md_js md_no-touch md_js md_no-touch"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Торговая плошадка для ремесленников</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css?3') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend.css?2') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bxslider.css?v1') }}" />


    </head>
    <body>
            <div class="wide_layout relative w_xs_auto">

            <!--[if (lt IE 9) | IE 9]>

                <div style="background:#fff;padding:8px 0 10px;">

                <div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>

            <![endif]-->

            <!-- header -->

<style type="text/css">
.type_5[role="banner"] .h_bot_part .menu_wrap.middle-header {
    position: relative;
}
.main_menu > li > a {
    padding: 15px 20px;
}
.site-logo-text h2 {
    color: #c638bc;
    font-size: 30px;
}
.site-logo-text h2 span {
    color: rgb(3, 114, 156);
}
.site-logo-text h3 {
    color: #ff6528;
    font-size: 11px;
    font-weight: bold;
    padding: 0px;
    text-align: center;
}
.main_menu > li:nth-last-child(1) .sub_menu_wrap,
.main_menu > li:nth-last-child(2) .sub_menu_wrap,
.main_menu > li:nth-last-child(3) .sub_menu_wrap {
    left: 0;
    right: 0;
}
.sub_menu_wrap {
    position: absolute;
    left: 0px;
    right: 0px;
    width: 100%;
    margin-top: 0px;
}
.sub_menu li a {
    display: block;
    padding: 7.7px 20px;
    padding-right: 0px;
    white-space: normal;
}
.button-type-1 {
    position: relative;
    border: 2px solid #95c538;
    padding: 8px 10px;
}
.button-type-1 i {
    font-size: 21px;
}
.button-type-1 .count {
    position: absolute;
    top: -5px;
    right: -5px;
}
.button-type-1:hover, .button-type-1:focus {
    border: 2px solid #34495e;
}
.button-type-1:hover .count, .button-type-1:focus .count {
    background-color: #95c538;
}
</style>

<header role="banner" class="type_5">
    <!--header top part-->
    <section class="h_top_part">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 t_xs_align_c">
                    <ul class="d_inline_b horizontal_list clearfix f_size_small users_nav">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <li><a href="#" class="default_t_color">Помощь</a></li>
                        <li><a href="#" class="default_t_color">Контакты</a></li>
                        <li><a href="#" class="default_t_color">О проекте</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c">

                    <ul class="horizontal_list clearfix d_inline_b t_align_l f_size_small site_settings type_2">

                        @if (Auth::guest())

                            <li class="m_left_20">
                                    <a class="default_t_color" href="{{ url('/register') }}" title="Регистрация">
                                        <i class="fa fa-user"></i>
                                        <span class="hidden-xs">Регистрация</span>
                                    </a>
                            </li>
                            <li class="m_left_20">
                                    <a class="default_t_color" href="{{ url('/login') }}" title="Вход">
                                        <i class="fa fa-sign-in"></i>
                                        <span class="hidden-xs">Вход</span>
                                    </a>
                            </li>

                        @else

                            <li class="m_left_20">
                                    <a class="default_t_color" href="{{ url('/account') }}" title="Регистрация">
                                        <i class="fa fa-user"></i>
                                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                    </a>
                            </li>


                            <li class="m_left_20">
                                    <a class="default_t_color" href="{{ url('/logout') }}" title="Выход">
                                        <i class="fa fa-sign-out"></i> <class="hidden-xs">Выход</span>
                                    </a>
                            </li>

                        @endif

                    </ul>

                </div>
            </div>
        </div>
    </section>

    <section class="h_bot_part">
        <div class="menu_wrap middle-header">
            <div class="container">
                <div class="clearfix row">
                    <div class="col-lg-3 t_md_align_c m_md_bottom_15">
                        <div class="site-logo">
                            <div class="site-logo-img">
                                <a href="{{ url('/') }}" title="Пашем и пашем">
                                    <img src="{{ asset('img/logo.png') }}" alt="HARD WORK">
                                </a>
                            </div>
                            <div class="site-logo-text">
                                <h2>HARD<span>WORK</span></h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 clearfix t_sm_align_c">
                        <div class="clearfix t_sm_align_l f_left f_sm_none relative full_width  m_sm_bottom_15 p_xs_hr_0 m_xs_bottom_5">
                            <form class="relative type_2" action="/frontend/search" method="GET" role="search">                                <input class="r_corners f_size_medium full_width" name="q" placeholder="Поиск   " type="text">                                 <button class="f_right search_button tr_all_hover f_xs_none">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>                        </div>
                    </div>

                </div>

            </div>
            <hr class="divider_type_6">
        </div>
    </section>

        <section class="menu_wrap relative bottom-header">
        <div class="container clearfix relative">
            <button class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_10 color_blue" id="menu_button">
                <span class="centered_db r_corners"></span>
                <span class="centered_db r_corners"></span>
                <span class="centered_db r_corners"></span>
            </button>
            <nav class="f_left f_xs_none d_xs_none" role="navigation">
                <ul class="horizontal_list main_menu clearfix">
                    <li class="current relative f_xs_none m_xs_bottom_5">
                        <a class="tr_delay_hover color_light tt_uppercase" href="{{ url('/') }}">
                            <strong>Главная</strong>
                        </a>
                    </li>
                    <li class="relative f_xs_none m_xs_bottom_5">
                        <a class="tr_delay_hover color_light tt_uppercase" href="#">
                            <strong>Каталог</strong>
                        </a>
                    </li>
                    <li class="relative f_xs_none m_xs_bottom_5">
                        <a class="tr_delay_hover color_light tt_uppercase" href="#">
                            <strong>Статьи</strong>
                        </a>
                    </li>

                    @if (!Auth::guest())

                        <li class="relative f_xs_none m_xs_bottom_5">
                            <a class="tr_delay_hover color_light tt_uppercase" href="{{ url('/account') }}">
                                <strong>Личный кабинет</strong>
                            </a>
                        </li>

                    @endif


                                    </ul>
            </nav>
        </div>
    </section>
    </header>




            <!--content-->
            <div class="page_content_offset">
                <div class="container">

    <!--content here-->
 @section('accountMenu')

    <div class="col-sm-3">
        <!-- sidebar user menu -->
                <div class="profile-sidebar shadow">
            <div class="profile-userpic">
                <img class="img-responsive" src="{{ asset('img/ava/avatar.png') }}" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <a href="#" title="Профиль">
                        @if (!Auth::guest())
                           {{ Auth::user()->name }}
                         @else
                             Гость
                         @endif
                     </a>
                </div>

            </div>

            <div class="profile-usermenu">
                <ul class="nav">



                            <li class="active1">
                                <a href="{{ url('/account/profile') }}">
                                    Профиль
                                </a>
                            </li>

                            <li class="">
                                <a href="{{ url('/account/shops') }}">
                                    Мои магазины
                                </a>
                            </li>


                    <li class="">
                        <a href="{{ url('/account/messages') }}">
                            Мои Сообщения <span class="badge badge-info new-messages-count"></span>
                        </a>
                    </li>



                </ul>
            </div>

        </div>

        <!-- begin left menu -->
                <!-- end left menu -->
    </div>


@show

    @yield('content')

                    </div>
            </div>

            <!-- footer -->

<footer id="footer" class="">
    <div class="footer_top_part" style="display: block;">
        <div class="container">
    <div class="row clearfix">




    </div>
    </div></div>

    <!--copyright -->
    <div class="footer_bottom_part">
        <div class="container clearfix t_mxs_align_c">
            <p class="f_left f_mxs_none m_mxs_bottom_10">© 2017 <a class="color_light" href="#">HARD WORK</a>. Все права защищены.</p>
        </div>
    </div>
</footer>
        </div>

        <div class="x-container"></div>
        <div class="center-layer text-center hidden"></div>







<div class="scrollwidth"></div>
</body></html>
