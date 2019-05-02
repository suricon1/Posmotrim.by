@extends('admin.layouts.layout')

@section('title', 'Admin | Каталог сортов винограда')
@section('key', 'Admin | Каталог сортов винограда')
@section('desc', 'Admin | Каталог сортов винограда')

@section('header-title', 'Каталог сортов винограда')

@section('content')

<div class="col">

    <div class="form-group">
        <a href="{{route('products.create')}}" class="btn btn-success">Добавить виноград</a>
    </div>
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">

            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Алиас</th>
                {{--<th>Теги</th>--}}
                <th>Картинка</th>
                <th>Действия</th>
            </tr>
            </thead>

            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->getCategory()}}</td>
                    <td>{{$product->slug}}</td>
                    {{--<td></td>--}}
{{--                    <td><img src="{{asset($product->getImage('100x100'))}}" alt="" width="100"></td>--}}
                    <td><img src="{{asset($product->getImage('100x100'))}}" alt="" width="100"></td>
                    <td>
                        <div class="btn-group" id="nav">
                            @if($product->status == 1)
                                <a class="btn btn-outline-warning btn-sm" href="{{route('products.toggle', ['id' => $product->id])}}" role="button"><i class="fa fa-lock"></i></a>
                            @else
                                <a class="btn btn-outline-success btn-sm" href="{{route('products.toggle', ['id' => $product->id])}}" role="button"><i class="fa fa-thumbs-o-up"></i></a>
                            @endif
                            <a class="btn btn-outline-primary btn-sm" href="{{route('products.edit', $product->id)}}" role="button"><i class="fa fa-pencil"></i></a>
                            @if($product->status != 1)
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('vinograd.product', ['alias' => $product->slug])}}" role="button" target="_blank">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                                {{Form::open(['route'=>['products.destroy', $product->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('Подтвердите удаление Статьи!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                                {{Form::close()}}
                        </div>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection