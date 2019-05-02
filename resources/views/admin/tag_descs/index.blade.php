@extends('admin.layouts.layout')

@section('title', 'Admin | Мета-данные тэгов')
@section('key', 'Admin | Мета-данные тэгов')
@section('desc', 'Admin | Мета-данные тэгов')

@section('header-title', 'Мета-данные тэгов')

@section('content')

    <div class="col">
        <div class="form-group">
            <a href="{{route('tag_desc.create')}}" class="btn btn-success">Добавить meta-данные</a>
        </div>
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Страна</th>
                    <th>Город</th>
                    <th>Тэг</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tagDescs as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{!! $item->getCountriTitle() !!}</td>
                        <td>{!! $item->getCityTitle() !!}</td>
                        <td>{!! $item->getTagTitle() !!}</td>
                        <td><a href="{{route('tag_desc.edit', $item->id)}}" class="btn btn-outline-success btn-sm" role="button"><i class="fa fa-pencil"></i></a>
                            {{Form::open(['route'=>['tag_desc.destroy', $item->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Подтвердите удаление города!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{$tagDescs->links('admin.components.pagination')}}
    </div>
@endsection