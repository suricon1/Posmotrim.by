@if($looks)
    <div class="Related-product mt-105 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-35">
                        <h3>Вы недавно смотрели</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-slider-active">
                    @foreach($looks as $product)
                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                            <div class="single-product mb-25">
                                <div class="product-img img-full">
                                    <a href="{{route('vinograd.product', ['slug' => $product->slug])}}">
                                        <img src="{{ asset($product->getImage('400x400')) }}" alt="">
                                    </a>
                                    <div class="product-action">
                                        <ul>
                                            {{--<li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>--}}
                                            <li><a href="#" class="open-modal" data-product-id="{{$product->id}}" title="Quick view"><i class="fa fa-search"></i></a></li>
                                            <li><a href="{{route('vinograd.cabinet.wishlist.add', ['id' => $product->id])}}" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="single-product.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h2><a href="{{route('vinograd.product', ['slug' => $product->slug])}}">{{ $product->name }}</a></h2>
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
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endif