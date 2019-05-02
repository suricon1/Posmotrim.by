    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!--Modal Img-->
                    <div class="col-md-5">
                        <!--Modal Tab Content Start-->
                        <div class="tab-content product-details-large" id="myTabContent">
                            <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                <!--Single Product Image Start-->
                                <div class="single-product-img img-full">
                                    <img src="{{ asset($product->getImage('700x700')) }}" alt="{{ $product->title }}">
                                </div>
                                <!--Single Product Image End-->
                            </div>

                            @foreach($product->getGallery('700x700') as $image)
                                <div class="tab-pane fade" id="single-slide{{$loop->iteration + 1}}" role="tabpanel" aria-labelledby="single-slide-tab-{{$loop->iteration + 1}}">
                                    <div class="single-product-img img-full">
                                        <img src="{{Storage::url($image)}}" alt="{{ $product->title }}">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!--Modal Content End-->
                        <!--Modal Tab Menu Start-->
                        <div class="single-product-menu">
                            <div class="nav single-slide-menu owl-carousel" role="tablist">
                                <div class="single-tab-menu img-full">
                                    <a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1">
                                        <img src="{{ asset($product->getImage('100x100')) }}" alt="{{ $product->title }}">
                                    </a>
                                </div>

                                @foreach($product->getGallery('100x100') as $image)
                                    <div class="single-tab-menu img-full">
                                        <a data-toggle="tab" id="single-slide-tab-{{$loop->iteration + 1}}" href="#single-slide{{$loop->iteration + 1}}">
                                            <img src="{{Storage::url($image)}}" alt="{{ $product->title }}">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!--Modal Tab Menu End-->
                    </div>
                    <!--Modal Img-->
                    <!--Modal Content-->
                    <div class="col-md-7">
                        <div class="modal-product-info">
                            <h1>{{ $product->name }}</h1>
                            <div class="modal-product-price">
                                <span class="old-price">$74.00</span>
                                <span class="new-price">${{ $product->price }}</span>
                            </div>

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

                            <a href="single-product.html" class="see-all">Полное описание сорта</a>
                            <div class="add-to-cart quantity">
                                <form class="add-quantity" action="index.html#">
                                    <div class="modal-quantity">
                                        <input type="number" value="1">
                                    </div>
                                    <div class="add-to-link">
                                        <button class="form-button" data-text="add to cart">add to cart</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!--Modal Content-->
                </div>
                <div class="row">
                    <div class="col">
                        <div class="cart-description">
                            <p>{!! $product->description !!}</p>
                        </div>
                        <div class="social-share mb-5 text-center">
                            <ul class="socil-icon2">
                                <li><a href="index.html"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="index.html"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="index.html"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="index.html"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>