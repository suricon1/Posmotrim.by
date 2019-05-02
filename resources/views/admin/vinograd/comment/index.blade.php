@extends('admin.layouts.layout')

@section('title', 'Admin-Vinograd | Комментарии')
@section('key', 'Admin-Vinograd | Комментарии')
@section('desc', 'Admin-Vinograd | Комментарии')

@section('header-title', 'Комментарии')

@section('content')

    <div class="col">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Продукт</th>
                <th>Текст</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td><a href="{{route('vinograd.product', ['slug' => $comment->product['slug']])}}">{{$comment->product['name']}}</a></td>
                    <td>{!! $comment->text !!}</td>
                    <td>
                        <div class="btn-group" id="nav">
                            @if($comment->status == 1)
                                <a class="btn btn-outline-warning btn-sm" href="{{route('vinograd.comments.toggle', ['id' => $comment->id])}}" role="button"><i class="fa fa-lock"></i></a>
                            @else
                                <a class="btn btn-outline-success btn-sm" href="{{route('vinograd.comments.toggle', ['id' => $comment->id])}}" role="button"><i class="fa fa-thumbs-o-up"></i></a>
                            @endif
                            <a href="{{route('vinograd.comments.edit', ['id' => $comment->id])}}" class="btn btn-outline-primary btn-sm" role="button"><i class="fa fa-pencil"></i></a>
                            {{Form::open(['route'=>['vinograd.comments.destroy', $comment->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Подтвердите удаление комментария!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$comments->links('admin.components.pagination')}}
    </div>

@endsection