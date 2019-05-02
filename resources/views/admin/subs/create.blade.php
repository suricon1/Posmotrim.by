@extends('admin.layouts.layout')

@section('title', 'Admin | Добавить Подписчика')
@section('key', 'Admin | Добавить Подписчика')
@section('desc', 'Admin | Добавить Подписчика')

@section('header-title', 'Добавить Подписчика')

@section('content')

    <div class="col">
        <section class="content">
        {{Form::open(['route'	=>	'subscribers.store'])}}
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{old('email')}}">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-success">Добавить</button>
                </div>
            </div>
            {{Form::close()}}
        </section>
    </div>
@endsection