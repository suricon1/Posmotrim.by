<div class="single-product mb-25">
    <div class="product-img img-full">
        <a href="{{route('vinograd.product', ['slug' => $product->slug])}}">
            <img src="{{asset($product->getImage('400x400'))}}" alt="{{$product->name}}">
        </a>
        <span class="onsale">Sale!</span>
        <div class="product-action">
            <ul>
                <li><a href="#" class="open-modal" data-product-id="{{$product->id}}" title="Quick view"><i class="fa fa-search"></i></a></li>
                <li><a href="{{route('vinograd.cabinet.wishlist.add', ['id' => $product->id])}}" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="index-5.html#" title="Compare"><i class="fa fa-refresh"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="product-content">
        <h2><a href="{{route('vinograd.product', ['slug' => $product->slug])}}">{{$product->name}}</a></h2>
        <div class="product-price">
            <div class="price-box">

                @forelse($modifications as $modification)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>{{$modification->name}}</strong> - {{$modification->price}}руб</span>
                        <span>- <strong>{{$modification->quantity}}</strong> шт</span>
                    </li>
                @empty
                    <p class="text-danger">Нет в наличии</p>
                @endforelse
            </div>
            <div class="add-to-cart">
                @forelse($modifications as $modification)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>{{$modification->name}}</strong></span>
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

            </div>
        </div>
    </div>
</div>