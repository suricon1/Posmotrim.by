@extends('admin.layouts.layout')

@section('title', 'Admin | Редактировать слайдер')
@section('key', 'Admin | Редактировать слайдер')
@section('desc', 'Admin | Редактировать слайдер')

@section('header-title', 'Редактировать слайдер')

@section('content')

    <div class="col">
        {!! Form::open(['route' => ['sliders.update', $slider->id], 'method' => 'put', 'files'	=>	true]) !!}
        <div class="row">
            <div class="col-md-3" id="error_img">
                <img src="{{$slider->getImage('400x200')}}" id="image_preview" class="img-responsive" width="200">
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="exampleInputFile">Загрузить фото слайдера (Рекомендуемый размер фото не менее 1600 х 700 px.)</label>
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
            <input type="text" class="form-control" id="title" placeholder="" name="title" value="{{old('title', $slider->title)}}">
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea name="text" id="text" class="form-control">{{old('text', $slider->text)}}</textarea>
        </div>
        <div class="box-footer">
            <button class="btn btn-success">Сохранить</button>
        </div>
        {!! Form::close() !!}
    </div>

@endsection