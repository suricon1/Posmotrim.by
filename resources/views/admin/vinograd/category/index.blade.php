@extends('admin.layouts.layout')

@section('title', 'Admin | Список категорий виноградов')
@section('key', 'Admin | Список категорий виноградов')
@section('desc', 'Admin | Список категорий виноградов')

@section('header-title', 'Список категорий виноградов')

@section('content')

    <div class="col">
        <div class="form-group">
            <a href="{{route('categorys.create')}}" class="btn btn-success">Добавить категорию</a>
        </div>
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Заголовок</th>
                    <th>Алиас</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorys as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <div class="btn-group" id="nav">
                                <a href="{{route('categorys.edit', $category->id)}}" class="btn btn-outline-success btn-sm"
                                   role="button"><i class="fa fa-pencil"></i></a>
                                {{Form::open(['route'=>['categorys.destroy', $category->id], 'method'=>'delete'])}}
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
        {{--{{$categorys->links('admin.components.pagination')}}--}}
    </div>

@endsection