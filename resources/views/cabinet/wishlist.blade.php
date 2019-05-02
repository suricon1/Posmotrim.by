@extends('layouts.vinograd-left')

@section('title', 'Избранное')
@section('key', 'Избранное')
@section('desc', 'Избранное')

@section('breadcrumb-content')
   <li class="active">Избранное</li>
@endsection

@section('left-content')
    {{Form::open(['route'=>['vinograd.cabinet.wishlist.delete']])}}
    <div class="table-content table-responsive">
        <table class="table">
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th class="plantmore-product-remove">remove</th>--}}
                {{--<th class="plantmore-product-thumbnail">images</th>--}}
                {{--<th class="cart-product-name">Product</th>--}}
                {{--<th class="plantmore-product-price">Unit Price</th>--}}
                {{--<th class="plantmore-product-stock-status">Stock Status</th>--}}
                {{--<th class="plantmore-product-add-cart">add to cart</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            <tbody>

            @forelse($products as $product)
            <tr>
                <td class="plantmore-product-remove">
                    {{Form::hidden('product_id', $product->id)}}
                    {{Form::button('<i class="fa fa-remove"></i>', [
                        'onclick' =>"return confirm('Подтвердите удаление!')",
                        'type' => 'submit',
                        'class' => "btn btn-outline-danger btn-sm"
                    ])}}
                </td>
                <td class="plantmore-product-thumbnail">
                    <a href="{{route('vinograd.product', ['slug' => $product->slug])}}">
                        <img src="{{asset($product->getImage('100x100'))}}" width="100">
                    </a>
                </td>
                <td class="plantmore-product-name"><a href="{{route('vinograd.product', ['slug' => $product->slug])}}">{{$product->name}}</a></td>
                <td class="plantmore-product-price"><span class="amount">{{$product->price}}</span></td>
                <td class="plantmore-product-stock-status"><span class="in-stock">in stock</span></td>
                <td class="plantmore-product-add-cart"><a href="#">add to cart</a></td>
            </tr>
            @empty
                <tr><td colspan="6"><h3>У Вас в избранном ничего нет!</h3></td></tr>
            @endforelse

            </tbody>
        </table>
    </div>
    {{Form::close()}}
@endsection