@extends('layouts.vinograd-left')

@section('title', $product->meta['title'])
@section('key', $product->meta['keywords'])
@section('desc', $product->meta['description'])

@section('breadcrumb-content')
    <li><a href="{{route('vinograd.category.section', ['slug' => $product->category->slug])}}">{{$product->category->name}}</a></li>
    <li class="active">{{ $product->name }}</li>
@endsection

@section('left-content')

<div class="single-product-area mb-115">
    <h1>{{ $product->name }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="product-details-img-tab">
                    <div class="tab-content single-product-img">
                        <div class="tab-pane fade show active" id="product1">
                            <div class="product-large-thumb img-full">
                                <img src="{{ asset($product->getImage('700x700')) }}" alt="{{ $product->title }}">
                            </div>
                        </div>

{{--                        @if($gallery)--}}
                        @foreach($product->getGallery('700x700') as $image)
                        <div class="tab-pane fade" id="product{{$loop->iteration + 1}}">
                            <div class="product-large-thumb img-full">
                                <img src="{{Storage::url($image)}}" alt="{{ $product->title }}">
                            </div>
                        </div>
                        @endforeach
                        {{--@endif--}}
                    </div>
                    <div class="product-menu">
                        <div class="nav product-tab-menu">
                            <div class="product-details-img">
                                <a class="active" data-toggle="tab" href="#product1">
                                    <img src="{{ asset($product->getImage('100x100')) }}" alt="{{ $product->title }}">
                                </a>
                            </div>

{{--                            @if($gallery)--}}
                                @foreach($product->getGallery('100x100') as $image)
                                    <div class="product-details-img">
                                        <a data-toggle="tab" href="#product{{$loop->iteration + 1}}">
                                            <img src="{{Storage::url($image)}}" alt="{{ $product->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            {{--@endif--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <!--Product Details Content Start-->
                <div class="product-details-content">
{{--                    <h1>{{ $product->name }}</h1>--}}
                    {{--<div class="single-product-price">--}}
                        {{--<span class="regular-price">Стоимость:</span>--}}
                        {{--<span class="price new-price">$66.00</span>--}}
                        {{--<span class="regular-price">${{ $product->price }}</span>--}}
                    {{--</div>--}}
                    {{--<div class="product-description">{!! $product->description !!} </div>--}}
                    {{--<h2>Основные характеристики</h2>--}}
                    <table class="table table-sm  table-hover">
                        <tbody>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Срок созревания</th>
                                <td>{{ $product->ripening }} дней</td>
                            </tr>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Масса грозди</th>
                                <td>{{ $product->mass }} г</td>
                            </tr>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Окраска</th>
                                <td>{{ $product->color }}</td>
                            </tr>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Вкус</th>
                                <td>{{ $product->flavor }}</td>
                            </tr>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Морозоустойчивость</th>
                                <td>{{ $product->frost }} &#8451;</td>
                            </tr>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Устойчивость к болезням</th>
                                <td>средняя</td>
                            </tr>
                            <tr>
                                <th scope="row"><span class="stock in-stock"></span>Цветок</th>
                                <td>{{ $product->flower }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="single-product-quantity">
                        <ul class="list-group">
                            <h3>У нас в продаже</h3>
                            @forelse($product->getModifications() as $modification)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span style="max-width: 50%;"><strong>{{$modification->name}}</strong> - {{$modification->price}}руб.<br>
                                    В наличии <strong>{{$modification->quantity}}</strong> шт.</span>
                                    <div>
                                        {{Form::open(['route'=>['vinograd.cart.add'], 'class' => 'add-quantity'])}}
                                        <div class="product-quantity">
                                            {{Form::number('quantity', 1)}}
                                            {{Form::hidden('product_id', $product->id)}}
                                            {{Form::hidden('modification_id', $modification->id)}}
                                        </div>
                                            <button class="product-btn"></button>
                                        {{Form::close()}}
                                    </div>
                            </li>
                                @empty
                                    <p class="text-danger">Нет в наличии</p>
                                @endforelse
                        </ul>
                    </div>
                    <div class="wishlist-compare-btn">
                        <a href="{{route('vinograd.cabinet.wishlist.add', ['id' => $product->id])}}" class="wishlist-btn">В избранное</a>
                        <a href="single-product.html#" class="add-compare">Сравнить</a>
                    </div>
                    <div class="product-meta">
                        <span class="posted-in">Категории:
                            <a href="single-product.html#">Столовые сорта</a>,
                        </span>
                    </div>
                    <div class="single-product-sharing">
                        <h3>Поделиться в соцСетях</h3>
                        <ul>
                            <li><a href="single-product.html#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="single-product.html#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="single-product.html#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="single-product.html#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="single-product.html#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-description-review-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-review-tab">
                    <ul class="nav dec-and-review-menu">
                        <li>
                            <a class="active" data-toggle="tab" href="#description">Описание</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#reviews">Отзывы ({{count($comments)}})</a>
                        </li>
                    </ul>
                    <div class="tab-content product-review-content-tab" id="myTabContent-4">
                        <div class="tab-pane fade active show" id="description">
                            <div class="single-product-description">
                                <h2>Описание сорта {{ $product->name }}</h2>
                                <p>{!! $product->content !!}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews">
                            <div class="review-page-comment comments-area" id="parent_coment">
                                <div class="comments-area mt-80" id="parent_coment">
                                    @if(count($comments) > 0)
                                        <a name="comments"></a>
                                        <h3>Коментарии:</h3>
                                        @include('components.comment-item', ['comments' => $comments])
                                    @else
                                        <h3 class="mt-5">Вы можете оставить первый комментарий!</h3>
                                    @endif
                                </div>
                            </div>
                            <div class="review-form-wrapper">
                                <div class="review-form" id="form_add_comment">
                                    @include('components.comment-form', ['id' => $product->id, 'url' => route('vinograd.ajax-comment.add')])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Review And Description Tab Content End-->
            </div>
        </div>
    </div>
</div>
<!--Product Description Review Area Start-->
<!--Also Like Product Start-->
<div class="also-like-product">
    <div class="container">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title text-center mb-35">
                    <h3>You may also like…</h3>
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
                            <div class="product-action">
                                <ul>
                                    <li><a href="single-product.html#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                    <li><a href="single-product.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
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
                                    <a href="single-product.html#">Add To Cart</a>
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
                                    <li><a href="single-product.html#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                    <li><a href="single-product.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h2><a href="single-product.html">Nulla sed stg</a></h2>
                            <div class="product-price">
                                <div class="price-box">
                                    <span class="regular-price">$40.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <a href="single-product.html#">Add To Cart</a>
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
                                    <li><a href="single-product.html#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                    <li><a href="single-product.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
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
                                    <a href="single-product.html#">Add To Cart</a>
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
                                    <li><a href="single-product.html#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                    <li><a href="single-product.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h2><a href="single-product.html">Vulputate justo</a></h2>
                            <div class="product-price">
                                <div class="price-box">
                                    <span class="regular-price">$70.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <a href="single-product.html#">Add To Cart</a>
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
                                    <li><a href="single-product.html#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                    <li><a href="single-product.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h2><a href="single-product.html">Ipsum imperdie</a></h2>
                            <div class="product-price">
                                <div class="price-box">
                                    <span class="regular-price">$100.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <a href="single-product.html#">Add To Cart</a>
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
                                    <li><a href="single-product.html#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                    <li><a href="single-product.html#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h2><a href="single-product.html">Pellentesque position</a></h2>
                            <div class="product-price">
                                <div class="price-box">
                                    <span class="regular-price">$90.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <a href="single-product.html#">Add To Cart</a>
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
<!--Also Like Product End-->

@endsection