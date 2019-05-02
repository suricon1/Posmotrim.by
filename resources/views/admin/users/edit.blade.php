@extends('admin.layouts.layout')

@section('header-title', 'Редактирование пользователя')

@section('content')

    {{Form::open([
        'route'	=>	['users.update', $user->id],
        'method'	=>	'put',
        'files'	=>	true
    ])}}
    <div class="form-group">
        <label for="exampleInputEmail1">Имя</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder=""
               value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder=""
               value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Пароль</label>
        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="">
    </div>
    <div class="form-group">
        <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Аватар</label>
        <input type="file" name="avatar" id="exampleInputFile">

        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
    </div>
    <div class="box-footer">
        <button class="btn btn-warning">Изменить</button>
    </div>
    {{Form::close()}}

@endsection