@extends('layouts.vinograd-left')

@section('title', isset($category) ? $category->title : 'Весь каталог сортов винограда на сайте')
@section('key', isset($category) ? $category->meta_key : 'Весь каталог сортов винограда на сайте')
@section('desc', isset($category) ? $category->meta_desc : 'Весь каталог сортов винограда на сайте')

@section('breadcrumb-content')
    <li class="active">{{$category->title or 'Весь каталог сортов винограда на сайте'}}</li>
@endsection

@section('section-title')
    @include('components.section-title', ['title' => isset($category) ? $category->title : 'Весь каталог сортов винограда на сайте'])
@endsection

@section('left-content')
    <div class="shop-layout">
        <div class="shop-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
            <div class="grid-list-option">
                <ul class="nav">
                    <li>
                        <a data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                    </li>
                    <li>
                        <a class="active" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                    </li>
                </ul>
            </div>
            <div class="toolbar-short-area d-md-flex align-items-center">
                <div class="toolbar-shorter ">
                    <label>Sort By:</label>
                    <select class="wide">
                        <option data-display="Select">Nothing</option>
                        <option value="Relevance">Relevance</option>
                        <option value="Name, A to Z">Name, A to Z</option>
                        <option value="Name, Z to A">Name, Z to A</option>
                        <option value="Price, low to high">Price, low to high</option>
                        <option value="Price, high to low">Price, high to low</option>
                    </select>
                </div>
                <p class="show-product">Показано: {{$products->firstItem()}} - {{$products->lastItem()}} из {{$products->total()}} товаров</p>
            </div>
        </div>
        <div class="shop-product">
            <div id="myTabContent-2" class="tab-content">
                <div id="grid" class="tab-pane fade">
                    <div class="product-grid-view">
                        <div class="row">

                            @foreach($products as $product)
                                @php $modifications = $product->getModifications(); @endphp

                                <div class="col-xl-4 col-md-6">
                                    @include('vinograd.components.single-product-item', ['product' => $product, 'modifications' => $modifications])
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
                <div id="list" class="tab-pane fade show active">
                    <div class="product-list-view">

                        @foreach($products as $product)
                            @php $modifications = $product->getModifications(); @endphp
                            <div class="product-list-item mb-5">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="single-product">
                                            <div class="product-img img-full">
                                                <a href="{{route('vinograd.product', ['slug' => $product->slug])}}">
                                                    <img src="{{asset($product->getImage('700x700'))}}" alt="{{ $product->title }}">
                                                </a>
                                                <span class="onsale">Sale!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-content shop-list">
                                            <h2><a href="{{route('vinograd.product', ['slug' => $product->slug])}}">{{ $product->name }}</a></h2>
                                            <div class="product-reviews">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-description">
                                                <p>{{$product->description}}</p>
                                            </div>
                                            <div class="product-price">
                                                <ul class="list-group">
                                                @forelse($modifications as $modification)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span><strong>{{$modification->name}}</strong> - {{$modification->price}}руб.</span>
                                                        {{Form::open(['route'=>['vinograd.cart.add'], 'class' => 'add-quantity'])}}
                                                            {{Form::hidden('product_id', $product->id)}}
                                                            {{Form::hidden('modification_id', $modification->id)}}
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon2">шт</span>
                                                                </div>
                                                                {{Form::number('quantity', 1, ['class' => 'form-control'])}}
                                                                <div class="input-group-append" id="button-addon4">
                                                                    {{Form::button('', ['class' => 'product-btn', 'type' => 'submit'])}}
                                                                </div>
                                                            </div>
                                                        {{Form::close()}}
                                                    </li>
                                                @empty
                                                    <p class="text-danger">Нет в наличии</p>
                                                @endforelse

                                                </ul>
                                            </div>
                                            <div class="product-list-action">
                                                <ul>
                                                    <li><a href="#" class="open-modal" data-toggle="modal" data-product-id="{{$product->id}}" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="{{route('vinograd.cabinet.wishlist.add', ['id' => $product->id])}}" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="shop-list.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="product-pagination">
                    {{$products->links('components.pagination')}}
                </div>
            </div>
        </div>
    </div>
@endsection