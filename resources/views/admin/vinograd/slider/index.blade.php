@extends('admin.layouts.layout')

@section('title', 'Admin | Список элементов слайдера')
@section('key', 'Admin | Список элементов слайдера')
@section('desc', 'Admin | Список элементов слайдера')

@section('header-title', 'Список элементов слайдера')

@section('content')

    <div class="col">
        <div class="form-group">
            <a href="{{route('sliders.create')}}" class="btn btn-success">Добавить слайдер</a>
        </div>
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th>Фото</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->text}}</td>
                        <td><img width="100" src="{{$slider->getImage('100x50')}}"></td>
                        <td>
                            <div class="btn-group" id="nav">
                                <a href="{{route('sliders.edit', $slider->id)}}" class="btn btn-outline-success btn-sm"
                                   role="button"><i class="fa fa-pencil"></i></a>
                                {{Form::open(['route'=>['sliders.destroy', $slider->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('Подтвердите удаление!')" type="submit"
                                        class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tfoot>
            </table>
        </div>
        {{--{{$categorys->links('admin.components.pagination')}}--}}
    </div>

@endsection