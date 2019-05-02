@extends('layouts.site')

@section('title', 'Все достопримечательности Мира на Posmotrim.by')
@section('key', 'достопримечательности городов стран мира,фото, описание, карта достопримечательностей мира, природные достопримечательности, красивые места для фотосъёмки,природные красоты, мировые достопримечательности')
@section('desc', 'Posmotrim.by - достопримечательности Мира, фото, описание и карта достопримечательностей городов и стран Мира, сайт для путешественников и фотографов. Путешествуйте по природным и историческим достопримечательностям Мира вместе с нами.')

@section('content')
    <div class="title-area">
        <div class="container">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center">
                        <h1>Достопримечательности Мира, фото описание карта достопримечательностей городов и стран Мира</h1>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
        </div>
    </div>

    <!--Blog Area Start-->
    <div class="blog-area"  style="background-color: transparent">
        <div class="container">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <a href="#"><span>Блог</span></a>
                        <h3>Новое на сайте</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="blog-slider-active">
                    @foreach($postsNew as $post)
                    <div class="col-md-4">
                        <!--Single Blog Start-->
                        <div class="single-blog">
                            <div class="blog-img img-full">
                                <a href="{{ route('site.article', ['alias'=>$post->slug]) }}">
                                    <img src="{{ $post->getImage() }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="post-date">01/12/2018</div>
                                <h3 class="post-title"><a href="{{ route('site.article', ['alias'=>$post->slug]) }}">{{ $post->title }}</a></h3>
                                <p class="post-description">
                                    @if($post->description)
                                        {!! $post->description !!}
                                    @else
                                        {{ $post->StrLimit($post->content, 200) }}
                                    @endif
                                </p>
                                <p class="post-author">
                                    <img src="/site/img/icon/author.png" alt=""> <span>Posted by </span>
                                    <a href="index.html#">admin </a>
                                </p>
                            </div>
                        </div>
                        <!--Single Blog End-->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Blog Area End-->

    <!--Blog Area Start-->
    <div class="blog-area">
        <div class="container">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <a href="#"><span>Блог</span></a>
                        <h3>Популярное на сайте</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="blog-slider-active">
                    @foreach($postsPopular as $post)
                        <div class="col-md-4">
                            <!--Single Blog Start-->
                            <div class="single-blog">
                                <div class="blog-img img-full">
                                    <a href="{{ route('site.article', ['alias'=>$post->slug]) }}">
                                        <img src="{{ $post->getImage() }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="post-date">01/12/2018</div>
                                    <h3 class="post-title"><a href="{{ route('site.article', ['alias'=>$post->slug]) }}">{{ $post->title }}</a></h3>
                                    <p class="post-description">
                                        @if($post->description)
                                            {!! $post->description !!}
                                        @else
                                            {{ $post->StrLimit($post->content, 200) }}
                                        @endif
                                    </p>
                                    <p class="post-author">
                                        <img src="/site/img/icon/author.png" alt=""> <span>Posted by </span>
                                        <a href="index.html#">admin </a>
                                    </p>
                                </div>
                            </div>
                            <!--Single Blog End-->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Blog Area End-->

    <!--Banner Area Start-->
    <div class="banner-area pt-105">
        <div class="container-fluid pl-50 pr-50">
            <div class="row">
                <div class="col-md-4">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index.html#">
                                <img src="/site/img/banner/banner1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index.html#">
                                <img src="/site/img/banner/banner2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index.html#">
                                <img src="/site/img/banner/banner3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
        </div>
    </div>
    <!--Banner Area End-->

    <!--Product Area Start-->
    <div class="product-area mt-85">
        <div class="container">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <a href="{{ route('svemi.index') }}"><span>SwEmi - Украшения ручной работы</span></a>
                        <h3>Рекомендуемое</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="product-slider-active">
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product1.jpg" alt="">
                                </a>
                                <span class="onsale">Sale!</span>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Eleifend quam</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$115.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product2.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Odio tortor consequat</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$90.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product3.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Commodo dolor</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$80.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product4.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Fusce tempor</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$55.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product5.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Integer eget augue</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$100.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product6.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Egestas dapibus</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$55.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product7.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Auctor sem</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$100.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product8.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Sapien libero</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$82.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product9.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Pharetra sagittis</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$100.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product10.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Turpis et iaculis</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$65.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product11.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Sit amet felis</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$90.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product12.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Lacus dignissim</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$80.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Area End-->

    <!--Banner Area Start-->
    <div class="banner-area pt-105">
        <div class="container-fluid pl-50 pr-50">
            <div class="row">
                <div class="col-md-4">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index.html#">
                                <img src="/site/img/banner/banner1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index.html#">
                                <img src="/site/img/banner/banner2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4">
                    <!--Single Banner Area Start-->
                    <div class="single-banner mb-35">
                        <div class="banner-img">
                            <a href="index.html#">
                                <img src="/site/img/banner/banner3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
        </div>
    </div>
    <!--Banner Area End-->

    <!--Product Area Start-->
    <div class="product-area mt-85">
        <div class="container">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <a href="{{ route('vinograd.home') }}"><span>Виноград в Минске</span></a>
                        <h3>Популярные сорта винограда</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="product-slider-active">
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product1.jpg" alt="">
                                </a>
                                <span class="onsale">Sale!</span>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Eleifend quam</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$115.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product2.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Odio tortor consequat</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$90.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product3.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Commodo dolor</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$80.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product4.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Fusce tempor</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$55.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product5.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Integer eget augue</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$100.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product6.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Egestas dapibus</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$55.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product7.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Auctor sem</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$100.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product8.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Sapien libero</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$82.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product9.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Pharetra sagittis</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$100.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product10.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Turpis et iaculis</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$65.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product11.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Sit amet felis</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$90.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="single-product mb-25">
                            <div class="product-img img-full">
                                <a href="single-product.html">
                                    <img src="/site/img/product/product12.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <ul>
                                        <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="index.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="index.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Lacus dignissim</a></h2>
                                <div class="product-price">
                                    <div class="price-box">
                                        <span class="regular-price">$80.00</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="index.html#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Area End-->

    <!--Our History Area Start-->
    <div class="our-history-area mt-85">
        <div class="container">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <h2>Про наш проект</h2>
                        <span>Немного о нас</span>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                    <div class="history-area-content text-center">
                        <p><strong>Captain America: Civil War Christopher Markus and Stephen McFeely see the Hulk as the game over moment.</strong></p>
                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus. Phasellus eu rhoncus dolor, vitae scelerisque sapien</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Our History Area End-->
@endsection