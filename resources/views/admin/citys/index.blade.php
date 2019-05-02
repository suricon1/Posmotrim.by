@extends('admin.layouts.layout')

@section('title', 'Admin | Список городов')
@section('key', 'Admin | Список городов')
@section('desc', 'Admin | Список городов')

@section('header-title', 'Список городов')

@section('content')

<div class="col">
    <div class="form-group">
        <a href="{{route('city.create')}}" class="btn btn-success">Добавить город</a>
    </div>
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Заголовок</th>
                <th>Алиас</th>
                <th>Страна</th>
                <th>Картинка</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($citys as $city)
                <tr>
                    <td>{{$city->name}}</td>
                    <td>{{$city->title}}</td>
                    <td>{{$city->slug}}</td>
                    <td>{{$city->countri->name}}</td>
                    <td><img src="{{$city->getImage('200x100')}}" width="100"></td>
                    <td><a href="{{route('city.edit', $city->id)}}" class="btn btn-outline-success btn-sm" role="button"><i class="fa fa-pencil"></i></a>
                        {{Form::open(['route'=>['city.destroy', $city->id], 'method'=>'delete'])}}
                        <button onclick="return confirm('Подтвердите удаление города!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                        {{Form::close()}}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{$citys->links('admin.components.pagination')}}
</div>
@endsection