@extends('admin.layouts.layout')

@section('title', 'Admin | Редактировать тэг')
@section('key', 'Admin | Редактировать тэг')
@section('desc', 'Admin | Редактировать тэг')

@section('header-title', 'Редактировать тэг')

@section('content')

<div class="col-sm-10">
    {{Form::open(['route'=>['tags.update',$tag->id], 'method'=>'put'])}}
    <div class="form-group">
        <label for="exampleInputEmail1">Название</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder=""
               value="{{$tag->title}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Алиас</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="slug" placeholder=""
               value="{{$tag->slug}}">
    </div>
    <div class="box-footer">
        <button class="btn btn-warning">Изменить</button>
    </div>
    {{Form::close()}}
</div>

@endsection