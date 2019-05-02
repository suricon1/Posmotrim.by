<!doctype html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('key')" />
    <meta name="description" content="@yield('desc')" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="@yield('favicon')">

    <link rel="stylesheet" href="{{ mix('css/app.css', 'build') }}">
    <link rel="stylesheet" href="{{ mix('css/custom.css', 'build') }}">

    <style>
        #login-modal a {
            color: #4f8db3;
        }
        #login-modal p {
            font-weight: 300;
            margin-bottom: 20px;
        }

        @yield('header-style')
    </style>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper">

    @yield('header')

    @yield('slider')

    @yield('breadcrumb')

    @include('components.errors')
    @include('components.status')

    @yield('content')

    <!--Footer Area Start-->
    <footer>
        <div class="footer-container">
            @section('footer')
            <!--Footer Top Area Start-->
            <div class="footer-top-area black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>My Account</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="index.html#">Team Member</a></li>
                                    <li><a href="index.html#">Career</a></li>
                                    <li><a href="index.html#">Specials</a></li>
                                    <li><a href="shop.html">Best sellers</a></li>
                                    <li><a href="index.html#">Our stores</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="index.html#">My orders</a></li>
                                    <li><a href="index.html#">Terms & Conditions</a></li>
                                    <li><a href="index.html#">Returns & Exchanges</a></li>
                                    <li><a href="index.html#">Shipping & Delivery</a></li>
                                    <li><a href="index.html#">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>Quick Links</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="index.html#">Support Center</a></li>
                                    <li><a href="index.html#">Term & Conditions</a></li>
                                    <li><a href="index.html#">Shipping</a></li>
                                    <li><a href="index.html#">Privacy Policy</a></li>
                                    <li><a href="index.html#">Help</a></li>
                                    <li><a href="index.html#">Products Return</a></li>
                                    <li><a href="faq.html">FAQS</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="index.html#">Bedroom</a></li>
                                    <li><a href="index.html#">Furniture</a></li>
                                    <li><a href="index.html#">Livingroom</a></li>
                                    <li><a href="index.html#">Mobiles & Tablets</a></li>
                                    <li><a href="index.html#">Men</a></li>
                                    <li><a href="index.html#">Women</a></li>
                                    <li><a href="index.html#">Accessories</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Top Area End-->
            <!--Footer Middle Area Start-->
            <div class="footer-middle-area black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{$logo ?? '/img/logo/logo-footer.png'}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-info">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <p>Address : No 40 Baria Sreet 15/2 NewYork City, NY, United States.</p>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-info">
                                    <div class="icon">
                                        <i class="fa fa-envelope-open-o"></i>
                                    </div>
                                    <p>Email: <br>info@yourmail.com</p>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-info">
                                    <div class="icon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <p>Phone: <br>(+68) 123 456 7890</p>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Middle Area End-->
            @show
            <!--Footer Bottom Area Start-->
            <div class="footer-bottom-area black-bg pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="news-letter-form text-center mb-3">

                                {{Form::open(['route' => 'subscribers', 'class' => 'popup-subscribe-form validate'])}}
                                <div id="mc-form" class="mc-form subscribe-form" >
                                    <input id="mc-email" autocomplete="off" type="email" class="form-control" placeholder="Подписаться на новости сайта ..." name="email" value="{{old('email')}}">
                                    <button id="mc-submit">Подписаться <i class="fa fa-chevron-right"></i></button>
                                </div>
                                {{Form::close()}}

                            </div>
                            <!--Footer Menu Start-->
                            <div class="footer-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="{{--{{ route('sitemap') }}--}}">Site Map</a></li>
                                        <li><a href="index.html#">Search Terms</a></li>
                                        <li><a href="index.html#">Advanced Search</a></li>
                                        <li><a href="index.html#">Orders and Returns</a></li>
                                        <li><a href="index.html#">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--Footer Menu End-->
                            <!--Footer Copyright Start-->
                            <div class="footer-copyright">
                                <p>Copyright © <a href="{{route('home')}}">Posmotrim.by</a> Все права защищены</p>
                            </div>
                            <!--Footer Copyright End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Bottom Area End-->
        </div>
    </footer>
    <!--Footer Area End-->
    <div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-hidden="true"></div>

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Войти на сайт</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="login-modal-body">

                </div>
            </div>
        </div>
    </div>

@include('components.errorModal')
    <!-- Modal SuccesModal -->
    <div class="modal fade" id="SuccesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="Succes" class="alert alert-success" role="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ mix('js/app.js', 'build') }}"></script>

@yield('scripts')

</body>
</html>