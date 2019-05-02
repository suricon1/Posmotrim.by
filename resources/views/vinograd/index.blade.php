@extends('layouts.vinograd-left')

@section('title', 'Виноград в Минске, черенки винограда, саженцы винограда, купить в Минске. Интернет магазин черенков и саженцев виноградов в Минске')
@section('key', 'Виноград в Минске')
@section('desc', 'Виноград в Минске. Интернет магазин черенков и саженцев виноградов в Минске. Купить черенки и саженцы самых популярных и проверенных сортов винограда.')

@section('header-absolute', 'header-absolute')

@section('header-style')
    .is-body-sticky {
        margin-top: 0;
    }
@endsection

@section('slider')
    {{--<div class="slider-area">--}}
        {{--<div class="hero-slider owl-carousel">--}}
            {{--@foreach($sliders as $slider)--}}
            {{--<div class="single-slider" style="background-image: url({{$slider->getImage()}})">--}}
                {{--<div class="slider-progress"></div>--}}
                {{--<div class="container">--}}
                    {{--<div class="hero-slider-content">--}}
                        {{--<h2>{!! $slider->title !!}</h2>--}}
                        {{--<div class="slider-border"></div>--}}
                        {{--<p>{{$slider->text}}</p>--}}
                        {{--<div class="slider-btn">--}}
                            {{--<a href="index.html#">Shop Collection <i class="fa fa-chevron-right"></i></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}



    <div id="carousel" class="carousel slide d-inline-block  carousel-fade" data-ride="carousel">
        <!-- Индикаторы -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @foreach($sliders as $slider)
            <div class="carousel-item{{$loop->iteration == 1 ? ' active' : ''}}"  data-interval="3000">
                <img class="img-fluid" src="{{$slider->getImage('1600x700')}}">
                <div class="carousel-caption bg-opacity-white-50">
                    <h2>{!! $slider->title !!}</h2>
                    <p>{{$slider->text}}</p>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Элементы управления -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Предыдущий</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Следующий</span>
        </a>
    </div>

    <!--Feature Area Start-->
    <div class="feature-area mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!--Single Feature Start-->
                    <div class="single-feature mb-35">
                        <div class="feature-icon">
                            <span class="fa fa-rocket"></span>
                        </div>
                        <div class="feature-content">
                            <h3>FREE SHIPPING</h3>
                            <p>ALL ORDER OVER $100</p>
                        </div>
                    </div>
                    <!--Single Feature End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Feature Start-->
                    <div class="single-feature mb-35">
                        <div class="feature-icon">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="feature-content">
                            <h3>24/7 DEDICATED SUPPORT</h3>
                            <p>0123 456 789</p>
                        </div>
                    </div>
                    <!--Single Feature End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Feature Start-->
                    <div class="single-feature mb-35">
                        <div class="feature-icon">
                            <span class="fa fa-repeat"></span>
                        </div>
                        <div class="feature-content">
                            <h3>MONEY BACK</h3>
                            <p>IF THE ITEM DIDN’T SUIT YOU</p>
                        </div>
                    </div>
                    <!--Single Feature End-->
                </div>
            </div>
        </div>
    </div>
    <!--Feature Area End-->

@endsection

@section('breadcrumb', '')

@section('left-content')
    <div class="product-layout">

        <div class="store-area">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3>Сегодня в продаже</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="col-12">
                    <!--Store Tab Menu Start-->
                    <div class="store-product-menu">
                        <ul class="nav justify-content-center mb-45">
                            @foreach($categorys as $category)
                            <li><a class="{{$loop->iteration == 1 ? ' active' : ''}}" data-toggle="tab" href="#{{$category->slug}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--Store Tab Menu End-->
                </div>
                <div class="col-12">
                    <!--Store Tab Content Start-->
                    <div class="tab-content">
                        @foreach($products as $key => $value)
                        <div id="{{$key}}" class="tab-pane fade show{{$loop->iteration == 1 ? ' active' : ''}}">
                            <div class="row">
                                <div class="store-slider-active">
                                    {{--<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">--}}
                                    <div class="col-xl-4 col-md-6">

                                        <!--Single Product Start-->
                                        @foreach($value as $product)
                                            @php $modifications = $product->getModifications(); @endphp

                                            @include('vinograd.components.single-product-item', ['product' => $product, 'modifications' => $modifications])

                                            @if($loop->iteration % 2 == 0 && !$loop->last)
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                            @endif

                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--Store Tab Content End-->
                </div>
            </div>
        </div>
        <div class="banner-area mt-5">
            <div class="row">
                <div class="col-md-6">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index-5.html#">
                                <img src="/site/img/banner/banner6.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-6">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index-5.html#">
                                <img src="/site/img/banner/banner7.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
        </div>
        <div class="best-product mt-5">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <span>Замечательная коллекция виноградов</span>
                        <h3>Лучшие сорта винограда</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="product-list-slider-active2">
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product14.jpg" alt=""></a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Aliquam lobortis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$125.00</span>
                                            <span class="regular-price">$115.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product16.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Auctor gravida enim</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$85.00</span>
                                            <span class="regular-price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product5.jpg" alt=""></a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Aliquam lobortis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$80.00</span>
                                            <span class="regular-price">$50.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product15.jpg" alt=""></a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Kaoreet lobortis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="regular-price">$95.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product8.jpg" alt=""></a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Dignissim venenatis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="regular-price">$80.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product22.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Dignissim furniture</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$125.00</span>
                                            <span class="regular-price">$115.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product23.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Phasellus vel hendrerit</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="regular-price">$55.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product20.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Ornare sed consequat</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$499.00</span>
                                            <span class="regular-price">$515.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product19.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Pellentesque posuere</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$120.00</span>
                                            <span class="regular-price">$100.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product18.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Aliquam lobortis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="regular-price">$90.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product17.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Dignissim venenatis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="regular-price">$80.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product11.jpg" alt=""></a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Auctor gravida enim</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$85.00</span>
                                            <span class="regular-price">$60.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                    <div class="col-md-4">
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product2.jpg" alt=""></a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Kaoreet lobortis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="price">$125.00</span>
                                            <span class="regular-price">$120.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => 'test'])}}"><img src="/site/img/product/product4.jpg" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" class="open-modal" data-toggle="modal" title="Quick view" tabindex="0"><i class="fa fa-search"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="index-5.html#" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => 'test'])}}">Kaoreet lobortis</a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <span class="regular-price">$45.00</span>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index-5.html#" tabindex="0">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product Start-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection