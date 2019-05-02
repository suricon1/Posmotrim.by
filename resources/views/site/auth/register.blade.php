@extends('layouts.site-left')

@section('title', 'Регистрация')
@section('key', 'Регистрация')
@section('desc', 'Регистрация')

@section('breadcrumb-content')
    <li class="active">Регистрация</li>
@endsection

@section('left-content')
    <div class="form-group errors"></div>
    @if(session('status'))
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
    @endif

        <div class="customer-login-register col-md-8 offset-md-2">
            <div class="register-form">
                {!! Form::open(['route' => 'register']) !!}
                    <div class="form-group row">
                        {!! Form::label('name', 'Логин', ['class' => 'col-md-2 col-form-label'])!!}
                        <div class="col-md-10 form-fild">
                            {!! Form::text('name', old('name'), ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label'])!!}
                        <div class="col-md-10 form-fild">
                            {!! Form::email('email', old('email'), ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('password', 'Пароль', ['class' => 'col-md-2 col-form-label'])!!}
                        <div class="col-md-10 form-fild">
                            {!! Form::password('password', ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="register-submit">
                        {!! Form::button('Зарегистрировать', ['type' => 'submit', 'class' => 'form-button']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection