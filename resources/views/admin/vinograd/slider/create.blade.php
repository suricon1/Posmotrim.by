@extends('admin.layouts.layout')

@section('title', 'Admin | Добавить слайдер')
@section('key', 'Admin | Добавить слайдер')
@section('desc', 'Admin | Добавить слайдер')

@section('header-title', 'Добавить слайдер')

@section('content')

    <div class="col">
        {!! Form::open(['route' => 'sliders.store', 'files'	=>	true]) !!}
        <div class="row">
            <div class="col-md-3" id="error_img">
                <img src="/img/post_default.png" id="image_preview" class="img-responsive" width="200">
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="exampleInputFile">Загрузить заглавное фото (Размер фото: 1600 х 700 px.)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Выберите фото</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Заголовок (H1)</label>
            <input type="text" class="form-control" id="title" placeholder="" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea name="text" id="text" class="form-control">{{old('text')}}</textarea>
        </div>
        <div class="box-footer">
            <button class="btn btn-success">Добавить</button>
        </div>
        {!! Form::close() !!}
    </div>

@endsection