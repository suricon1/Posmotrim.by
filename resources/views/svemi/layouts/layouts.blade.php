<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('key')">
    <meta name="description" content="@yield('desc')">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="6ea8405f6a3ae565"/>
    <meta name="p:domain_verify" content="e4cd2ce9ecbcc0ff0514ac57d8e6f1f7"/>
    <meta name="google-site-verification" content="FIkA5JWSuGPqpLgHS4bRTp2edjS9AaY6ZH1l1ZfGayA"/>

    <link type="image/x-icon" href="/svemi/favicon.ico" rel="shortcut icon">
    <link href="/svemi/css/bootstrap.min.css" rel="stylesheet">
    <link href="/svemi/css/font-awesome.css" rel="stylesheet">
    <link href="/svemi/css/main.css" rel="stylesheet">
    <link href="/svemi/css/responsive.css" rel="stylesheet">

    @yield('canonical')

    <!--[if lte IE9]>
    <script src="/svemi/js/html5shiv.js"></script>
    <![endif]-->

</head><!--/head-->

<body>
<header id="header"><!--header-->

    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="/contact">Контакты</a></li>
                            <li><a href="/about">О нас</a></li>
                            <li><a href="/payment">Доставка и оплата</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/Svemihandmade/" target="_blank" rel="nofollow"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/ikana.sv/" target="_blank" rel="nofollow"><i
                                            class="fa fa-instagram"></i></a></li>
                            <li><a href="https://vk.com/svemihandmade" target="_blank" rel="nofollow"><i
                                            class="fa fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">

                    <div class="logo pull-left">
                        <a href="/"><img src="/svemi/images/home/logo.png" alt="SvEmi - Украшения ручной работы"></a>
                    </div>

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                </div>

                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/blog"><i class="fa fa-stack-exchange"></i> Блог</a></li>
                            @guest('svemi')
                                <li><a href="{{route('svemi.loginForm')}}"><i class="fa fa-sign-in"></i> Войти</a>
                            @else
                                <li><a href="{{route('svemi.logout')}}"><i class="fa fa-sign-out"></i> {{Auth::guard('svemi')->user()->name}} (Выход)</a></li>
                            @endguest

                            @if(is_admin('svemi'))
                                <li><a href="{{route('svemi.admin.dashboard')}}"><i class="fa fa-lock"></i> Админка</a></li>
                            @endif

<!--                        <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина</a></li>-->
                            <li class="search_box ">
                                <form method="get" action="/search">
                                    <input type="text" placeholder="Поиск" name="q">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->

<!-- Yandex.RTB R-A-190087-1 -->
<div id="yandex_rtb_R-A-190087-1" class="container"></div>
<script type="text/javascript">
    (function (w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function () {
            Ya.Context.AdvManager.render({
                blockId: "R-A-190087-1",
                renderTo: "yandex_rtb_R-A-190087-1",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>

<!--<div class="container">-->

<!--</div>-->

<section style="margin-top: 30px;">
    <div class="container-fluid">

        @yield('h1')

        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products">
                                <li>
                                    <a href="/category/4" onclick="return false;">Коллекции
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        <span class="dcjq-icon"></span>
                                    </a>
                                    <ul>
                                        <li><a href="/collection/1">Красная бирюза</a></li>
                                        <li><a href="/collection/3">Нежность</a></li>
                                        <li><a href="/collection/4">Осень</a></li>
                                        <li><a href="/collection/5">Лесные ягоды</a></li>
                                        <li><a href="/collection/6">Дыхание весны</a></li>
                                        <li><a href="/collection/7">Зимний узор</a></li>
                                        <li><a href="/collection/8">Зимние украшения</a></li>
                                        <li><a href="/collection/9">Украшения фигурки</a></li>
                                        <li><a href="/collection/10">Контрасты</a></li>
                                        <li><a href="/collection/11">Марта</a></li>
                                        <li><a href="/collection/12">Альпийский лед</a></li>
                                        <li><a href="/collection/13">малахит</a></li>
                                        <li><a href="/collection/14">Анютины глазки</a></li>
                                        <li><a href="/collection/15">Самоцветы и бисер</a></li>
                                        <li><a href="/collection/16">Арт роза</a></li>
                                        <li><a href="/collection/17">Арт Нуво (модерн)</a></li>
                                        <li><a href="/collection/18">Украшения с животными</a></li>
                                        <li><a href="/collection/19">Броши с насекомыми</a></li>
                                        <li><a href="/collection/20">Броши с орнаментами</a></li>
                                        <li><a href="/collection/21">Брошь с подвесками</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/4">Серьги ручной работы <span class="badge pull-right"><i class="fa fa-plus"></i></span></a>
                                    <ul>
                                        <li><a href="/category/1"> Серьги-грозди </a></li>
                                        <li><a href="/category/3">Серьги-цветы </a></li>
                                        <li><a href="/category/6">Серьги-еда </a></li>
                                        <li>
                                            <a href="/category/7">
                                                Серьги-композиция </a>
                                        </li>
                                        <li>
                                            <a href="/category/8">
                                                Серьги с подвесками </a>
                                        </li>
                                        <li>
                                            <a href="/category/9">
                                                Арт-серьги </a>
                                        </li>
                                        <li>
                                            <a href="/category/10">
                                                Классические серьги </a>
                                        </li>
                                        <li>
                                            <a href="/category/17">
                                                Серьги геометрической формы </a>
                                        </li>
                                        <li>
                                            <a href="/category/21">
                                                Серьги фигурки </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/11">
                                        Браслеты <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/category/31">
                                                Женские браслеты из бисера и самоцветов </a>
                                        </li>
                                        <li>
                                            <a href="/category/32">
                                                Женские браслеты ручной работы из полимерной глины </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/12">
                                        Брошь <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/category/13">
                                                Композиция </a>
                                        </li>
                                        <li>
                                            <a href="/category/14">
                                                брошь-цветок </a>
                                        </li>
                                        <li>
                                            <a href="/category/15">
                                                Фигурки броши </a>
                                        </li>
                                        <li>
                                            <a href="/category/18">
                                                Пуговица </a>
                                        </li>
                                        <li>
                                            <a href="/category/24">
                                                Броши из бисера и камней </a>
                                        </li>
                                        <li>
                                            <a href="/category/33">
                                                Брошь заколка </a>
                                        </li>
                                        <li>
                                            <a href="/category/35">
                                                Брошь с мехом </a>
                                        </li>
                                        <li>
                                            <a href="/category/36">
                                                Броши с лабрадорами </a>
                                        </li>
                                        <li>
                                            <a href="/category/38">
                                                Брошь игла </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/16">
                                        Колье <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/category/23">
                                                Колье-галстук </a>
                                        </li>
                                        <li>
                                            <a href="/category/25">
                                                Колье с бусинами </a>
                                        </li>
                                        <li>
                                            <a href="/category/26">
                                                Цветочное колье </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/19">
                                        Кулоны <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/category/20">
                                                Кулоны фигурки </a>
                                        </li>
                                        <li>
                                            <a href="/category/22">
                                                Кулоны подвески </a>
                                        </li>
                                        <li>
                                            <a href="/category/27">
                                                Кулоны из камней и бисера </a>
                                        </li>
                                        <li>
                                            <a href="/category/28">
                                                Кулоны цветы </a>
                                        </li>
                                        <li>
                                            <a href="/category/37">
                                                Женские кулоны с лабрадором </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/29">
                                        Кольца <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/category/30">
                                                Кольца с натуральными камнями </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/34">
                                        Женские вечерние сумочки </a>
                                </li>
                            </ul>
                </div>


            </div>

            <div class="col-sm-9">

                @include('components.errors')
                @include('components.status')

                @section('breadcrumbs')
                <nav class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/"><i class="fa fa-home"></i></a></li>

                        @yield('breadcrumb-content')

                        {{--<li class="active">Серьги ручной работы</li>--}}
                    </ol>
                </nav>
                @show

                @yield('content')

            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <!-- Yandex.RTB R-A-190087-2 -->
            <div id="yandex_rtb_R-A-190087-2"></div>
            <script type="text/javascript">
                (function (w, d, n, s, t) {
                    w[n] = w[n] || [];
                    w[n].push(function () {
                        Ya.Context.AdvManager.render({
                            blockId: "R-A-190087-2",
                            renderTo: "yandex_rtb_R-A-190087-2",
                            async: true
                        });
                    });
                    t = d.getElementsByTagName("script")[0];
                    s = d.createElement("script");
                    s.type = "text/javascript";
                    s.src = "//an.yandex.ru/system/context.js";
                    s.async = true;
                    t.parentNode.insertBefore(s, t);
                })(this, this.document, "yandexContextAsyncCallbacks");
            </script>
        </div>
        <div class="col-sm-4">
            <!-- Yandex.RTB R-A-190087-3 -->
            <div id="yandex_rtb_R-A-190087-3"></div>
            <script type="text/javascript">
                (function (w, d, n, s, t) {
                    w[n] = w[n] || [];
                    w[n].push(function () {
                        Ya.Context.AdvManager.render({
                            blockId: "R-A-190087-3",
                            renderTo: "yandex_rtb_R-A-190087-3",
                            async: true
                        });
                    });
                    t = d.getElementsByTagName("script")[0];
                    s = d.createElement("script");
                    s.type = "text/javascript";
                    s.src = "//an.yandex.ru/system/context.js";
                    s.async = true;
                    t.parentNode.insertBefore(s, t);
                })(this, this.document, "yandexContextAsyncCallbacks");
            </script>

        </div>
        <div class="col-sm-4">
            <!-- Yandex.RTB R-A-190087-4 -->
            <div id="yandex_rtb_R-A-190087-4"></div>
            <script type="text/javascript">
                (function (w, d, n, s, t) {
                    w[n] = w[n] || [];
                    w[n].push(function () {
                        Ya.Context.AdvManager.render({
                            blockId: "R-A-190087-4",
                            renderTo: "yandex_rtb_R-A-190087-4",
                            async: true
                        });
                    });
                    t = d.getElementsByTagName("script")[0];
                    s = d.createElement("script");
                    s.type = "text/javascript";
                    s.src = "//an.yandex.ru/system/context.js";
                    s.async = true;
                    t.parentNode.insertBefore(s, t);
                })(this, this.document, "yandexContextAsyncCallbacks");
            </script>
        </div>
    </div>
</div>
<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Контакты</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="single-widget  pull-right">
                        <h2>Подписывайтесь на рассылку ...</h2>
                        <form action="" class="searchform">
                            <input type="text" placeholder="Ваш Email адрес"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>И получайте новинки нашего сайта!</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <!-- Yandex.Metrika informer -->
                    <a href="https://metrika.yandex.ru/stat/?id=46286193&amp;from=informer"
                       target="_blank" rel="nofollow"><img
                                src="https://informer.yandex.ru/informer/46286193/3_0_FFFFFFFF_FFFFFFFF_0_pageviews"
                                style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"
                                title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"
                                class="ym-advanced-informer" data-cid="46286193" data-lang="ru"/></a>
                    <!-- /Yandex.Metrika informer -->

                    <!-- Yandex.Metrika counter -->
                    <script type="text/javascript">
                        (function (d, w, c) {
                            (w[c] = w[c] || []).push(function () {
                                try {
                                    w.yaCounter46286193 = new Ya.Metrika({
                                        id: 46286193,
                                        clickmap: true,
                                        trackLinks: true,
                                        accurateTrackBounce: true
                                    });
                                } catch (e) {
                                }
                            });

                            var n = d.getElementsByTagName("script")[0],
                                s = d.createElement("script"),
                                f = function () {
                                    n.parentNode.insertBefore(s, n);
                                };
                            s.type = "text/javascript";
                            s.async = true;
                            s.src = "https://mc.yandex.ru/metrika/watch.js";

                            if (w.opera == "[object Opera]") {
                                d.addEventListener("DOMContentLoaded", f, false);
                            } else {
                                f();
                            }
                        })(document, window, "yandex_metrika_callbacks");
                    </script>
                    <noscript>
                        <div><img src="https://mc.yandex.ru/watch/46286193" style="position:absolute; left:-9999px;"
                                  alt=""/></div>
                    </noscript>
                    <!-- /Yandex.Metrika counter -->
                </div>
                <p class="pull-left">Copyright © 2013- {{date('Y')}} SvEmi. Все права защищены.</p>
                <p class="pull-right">Разработано: <span><a target="_blank"
                                                            href="http://svemi.posmotrim.by">SvEmi</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<script src="/svemi/js/jquery.js"></script>
<script src="/svemi/js/bootstrap.min.js"></script>
<script src="/svemi/js/jquery.scrollUp.min.js"></script>
<script src="/svemi/js/jquery.cookie.js"></script>
<script src="/svemi/js/jquery.accordion.js"></script>
<script src="/svemi/js/main.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#cart').modal({"show":false});
    });
</script>

<script type="text/javascript"
        async defer
        src="//assets.pinterest.com/js/pinit.js">
</script>

</body>
</html>