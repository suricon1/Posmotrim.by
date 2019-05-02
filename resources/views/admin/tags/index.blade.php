@extends('admin.layouts.layout')

@section('title', 'Admin | Список тэгов')
@section('key', 'Admin | Список тэгов')
@section('desc', 'Admin | Список тэгов')

@section('header-title', 'Список тэгов')

@section('content')

<div class="form-group">
    <a href="{{route('tags.create')}}" class="btn btn-success">Добавить тэг</a>
</div>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>Алиас</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>
                    <div class="btn-group" id="nav">
                        <a class="btn btn-outline-primary btn-sm" href="{{route('tags.edit', $tag->id)}}" role="button"><i class="fa fa-pencil"></i></a>
                    {{Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'delete'])}}
                        <button onclick="return confirm('Подтвердите удаление тэга!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                    {{Form::close()}}
                    </div>
                </td>
            </tr>
        @endforeach

        </tfoot>
    </table>
</div>

@endsection