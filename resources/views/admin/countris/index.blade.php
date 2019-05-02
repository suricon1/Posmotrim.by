@extends('admin.layouts.layout')

@section('title', 'Admin | Список стран')
@section('key', 'Admin | Список стран')
@section('desc', 'Admin | Список стран')

@section('header-title', 'Список стран')

@section('content')

<div class="col">
    <div class="form-group">
        <a href="{{route('countri.create')}}" class="btn btn-success">Добавить страну</a>
    </div>
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Заголовок</th>
                <th>Алиас</th>
                <th>Картинка</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($countris as $countri)
                <tr>
                    <td>{{$countri->name}}</td>
                    <td>{{$countri->title}}</td>
                    <td>{{$countri->slug}}</td>
                    <td><img src="{{$countri->getImage('200x100')}}" width="100"></td>
                    <td>
                        <div class="btn-group" id="nav">
                        <a href="{{route('countri.edit', $countri->id)}}" class="btn btn-outline-success btn-sm"
                           role="button"><i class="fa fa-pencil"></i></a>
                        {{Form::open(['route'=>['countri.destroy', $countri->id], 'method'=>'delete'])}}
                        <button onclick="return confirm('Подтвердите удаление страны!')" type="submit"
                                class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                        {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{$countris->links('admin.components.pagination')}}
</div>

@endsection