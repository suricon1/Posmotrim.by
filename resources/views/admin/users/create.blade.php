@extends('admin.layouts.layout')

@section('header-title', 'Добавление пользователя')

@section('content')

<div class="col-md-10">
    {{Form::open(['route'	=>	'users.store', 'files'	=>	true])}}
    <div class="form-group">
        <label for="exampleInputEmail1">Имя</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder=""
               value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder=""
               value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Аватар</label>
        <input type="file" name="avatar" id="exampleInputFile">

        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
    </div>
    <div class="box-footer">
        <button class="btn btn-success">Добавить</button>
    </div>
    {{Form::close()}}
</div>

@endsection