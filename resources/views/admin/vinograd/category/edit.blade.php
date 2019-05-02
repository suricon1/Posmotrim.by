@extends('admin.layouts.layout')

@section('title', 'Admin | Редактировать категорию винограда')
@section('key', 'Admin | Редактировать категорию винограда')
@section('desc', 'Admin | Редактировать категорию винограда')

@section('header-title', 'Редактировать категорию винограда')

@section('content')

    <div class="col">
        {!! Form::open(['route' => ['categorys.update', $category->id], 'method' => 'put']) !!}
        <div class="form-group">
            <label for="name">Название (В меню)</label>
            <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{old('name', $category->name)}}">
        </div>
        <div class="form-group">
            <label for="slug">Алиас</label>
            <input type="text" class="form-control" id="slug" placeholder="" name="slug" value="{{old('slug', $category->slug)}}">
        </div>
        <div class="form-group">
            <label for="title">Заголовок (H1)</label>
            <input type="text" class="form-control" id="title" placeholder="" name="title" value="{{old('title', $category->title)}}">
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea name="text" id="text" class="form-control">{{old('text', $category->text)}}</textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_key">Описание (description)</label>
                    <textarea name="meta_desc" class="form-control" rows="3" placeholder="Мета-описание ...">{{old('meta_desc', $category->meta_desc)}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ключевые слова (keywords)</label>
                    <textarea name="meta_key" class="form-control" rows="3" placeholder="Ключевые слова ...">{{old('meta_key', $category->meta_key)}}</textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-success">Сохранить</button>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script>
        var editor = CKEDITOR.replace('text');
    </script>
@endsection