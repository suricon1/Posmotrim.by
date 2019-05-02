@extends('admin.layouts.layout')

@section('title', 'Admin | Добавить тэг')
@section('key', 'Admin | Добавить тэг')
@section('desc', 'Admin | Добавить тэг')

@section('header-title', 'Добавить тэг')

@section('content')

<div class="col-md-10">
    {!! Form::open(['route' => 'tags.store']) !!}
    <div class="form-group">
        <label for="exampleInputEmail1">Название</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
    </div>
    <div class="box-footer">
        <button class="btn btn-success">Добавить</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection