<?php if($product): ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">

                @admin
                <div class="product-edit">
                    {{--<a href="<!--<?= Url::to(['admin/product/update', 'id' => $product->id])?>-->" target="_blank" data-toggle="tooltip" title="Редактировать товар" class="pull-right"  data-placement="left">--}}
                    <a href="" target="_blank" data-toggle="tooltip" title="Редактировать товар" class="pull-right"  data-placement="left">
                        <i class="fa fa-pencil"></i>
                    </a>
                </div>
                @endadmin

                <a href="">{{Html::image($product->getImage('370x370'))}}</a>

                @if($product->price)
                    <h2>Стоимость:{{$product->price}} Руб.</h2>
                @endif

                {{Html::link(route('home'), $product->name)}}

                @if($product->buy)
                <a data-id="{{$product->id}}" class="btn btn-default add-to-cart reg" onclick="return showLink(this);" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i>Где можно купить</a>
                <div class="product-overlay" id="overlay-<?= $product->id ?>">
                    <div class="overlay-content">
                        @if($product->price)
                        <h2>Стоимость:{{$product->price}} Руб.</h2>
                        @endif

                        <h4><a href="">{{$product->name}}</a></h4>
                        <h4>Купить можно здесь:</h4>
                        <a href="">Доставка и оплата</a>
                        <p>{{$product->buy}}</p>
                        <a data-id="{{$product->id}}" class="btn btn-default add-to-cart" onclick="return clearLink(this);" id="{{$product->id}}"><i class="fa fa-close"></i>Закрыть</a>
                    </div>
                </div>
                @endif

            </div>

            @if($product->new)
                {{Html::image("/svemi/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])}}
            @endif
            @if($product->sale)
                {{Html::image("/svemi/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])}}
            @endif
        </div>
        <!--<div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>-->
    </div>
</div>
<?php endif?>