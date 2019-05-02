@extends('layouts.site-left')

@section('title', 'Авторизация')
@section('key', 'Авторизация')
@section('desc', 'Авторизация')

@section('left-content')
    <div class="form-group errors"></div>
    @if(session('status'))
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
    @endif

    @include('components.login-form')
@endsection