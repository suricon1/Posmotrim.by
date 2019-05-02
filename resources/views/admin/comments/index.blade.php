@extends('admin.layouts.layout')

@section('title', 'Admin | Список комментариев')
@section('key', 'Admin | Список комментариев')
@section('desc', 'Admin | Список комментариев')

@section('header-title', 'Список комментариев')

@section('content')

<div class="col">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Статья</th>
            <th>Текст</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td><a href="{{route('site.article', ['alias' => $comment->post['slug']])}}">{{$comment->post['title']}}</a></td>
                <td>{!! $comment->text !!}</td>
                <td>
                    <div class="btn-group" id="nav">
                    @if($comment->status == 1)
                        <a class="btn btn-outline-warning btn-sm" href="{{route('comments.toggle', ['id' => $comment->id])}}" role="button"><i class="fa fa-lock"></i></a>
                    @else
                        <a class="btn btn-outline-success btn-sm" href="{{route('comments.toggle', ['id' => $comment->id])}}" role="button"><i class="fa fa-thumbs-o-up"></i></a>
                    @endif
                    <a href="{{route('comments.edit', ['id' => $comment->id])}}" class="btn btn-outline-primary btn-sm" role="button"><i class="fa fa-pencil"></i></a>
                    {{Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'delete'])}}
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