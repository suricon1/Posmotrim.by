<div class="mini-cart">
    <a href="about.html#">
        <span class="cart-icon">
           <span class="cart-quantity">{{$cart->getAmount()}}</span>
        </span>
        <span class="cart-title">Ваша корзина <br><strong>{{$cart->getCost()->getTotal()}} руб</strong></span>
    </a>
    <!--Cart Dropdown Start-->
    <div class="cart-dropdown">
        <ul>
            @foreach($cart->getItems() as $item)
                @php
                    $product = $item->getProduct();
                    $modification = $item->getModification();
                @endphp
            <li class="single-cart-item">
                <div class="cart-img">
                    <a href="{{route('vinograd.product', ['slug' => $product->slug])}}"><img src="{{asset($product->getImage('100x100'))}}"></a>
                </div>
                <div class="cart-content">
                    <h5 class="product-name"><a href="{{route('vinograd.product', ['slug' => $product->slug])}}">{{$product->name}}</a></h5>
                    <span class="cart-price"><strong>{{$modification->name}}</strong><br>{{$item->getQuantity()}} × {{$item->getPrice()}} руб</span>
                </div>
                <div class="cart-remove">
                    {{Form::open(['route'=>['vinograd.cart.remove']])}}
                    {{Form::hidden('id', $item->getId())}}
                    {{Form::button('<i class="fa fa-times"></i>', [
                        'type' => 'submit',
                        'class' => "btn btn-link btn-sm",
                        'title' => 'Удалить'
                    ])}}
                    {{Form::close()}}
                </div>
            </li>
            @endforeach
        </ul>
        <p class="cart-subtotal"><strong>Стоимость:</strong> <span class="float-right">{{$cart->getCost()->getTotal()}} (бел. руб)</span></p>
        <p class="cart-btn">
            <a href="{{route('vinograd.cart.ingex')}}">В корзину</a>
            <a href="checkout.html">Оформить</a>
        </p>
    </div>
    <!--Cart Dropdown End-->
</div>