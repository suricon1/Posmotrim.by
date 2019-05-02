@extends('admin.layouts.layout')

@section('title', 'Admin | Добавить город')
@section('key', 'Admin | Добавить город')
@section('desc', 'Admin | Добавить город')

@section('header-title', 'Добавить город')

@section('content')

<div class="col-md-10">
    {!! Form::open(['route' => 'city.store', 'files' =>	true]) !!}
    <div class="card card-default collapsed-card">
        <div class="card-header">
            <button type="button" class="btn btn-tool" data-widget="collapse">
                <h3 class="card-title"><i class="fa fa-angle-right"></i>Заглавное фото</h3>
            </button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" id="error_img">
                    <img src="/img/post_default.png" id="image_preview" class="img-responsive" width="200">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="exampleInputFile">Загрузить заглавное фото (Размер фото (min): 1920 х 945 px.)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Выберите фото</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Название (В меню)</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="name" name="name" value="{{old('name')}}">
    </div>
    {{--<div class="input-group mb-3">--}}
    {{--<div class="input-group-prepend">--}}
    {{--<span class="input-group-text">Алиас</span>--}}
    {{--</div>--}}
    {{--<input type="text" class="form-control" aria-label="Small" id="slug" name="slug" value="{{old('slug')}}">--}}
    {{--</div>--}}
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Title страницы</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  id="meta_title" placeholder="" name="meta_title" value="{{old('meta_title')}}">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Заголовок (H1)</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="title" name="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="text">Текст. Для разделения блоков вставлять код %@==@%</label>
        <textarea name="text" id="text" class="form-control">{{old('text', $region_template)}}</textarea>
    </div>
    <div class="form-group">
        <label><input type="checkbox" class="minimal" name="is_lions"></label>
        <label>Преобразована в посадочную страницу.</label>
    </div>
    <div class="form-group">
        <label>Страна</label>
        {{Form::select('countri_id',
          $countris,
          null,
          [
              'class' => 'form-control select2',
              'placeholder' => 'Выберите страну'
          ])
        }}
    </div>
    <div class="form-group">
        <label for="text">Текст</label>
        <textarea name="text" id="text" class="form-control">{{old('text')}}</textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="meta_key">Описание (description)</label>
                {{--<input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="meta_key" value="{{old('meta_key')}}">--}}
                <textarea name="meta_desc" class="form-control" rows="3" placeholder="Мета-описание ...">{{old('meta_desc')}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Ключевые слова (keywords)</label>
                {{--<input type="text" class="form-control" id="meta_key" placeholder="" name="meta_desc" value="{{old('meta_desc')}}">--}}
                <textarea name="meta_key" class="form-control" rows="3" placeholder="Ключевые слова ...">{{old('meta_key')}}</textarea>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button class="btn btn-success">Добавить</button>
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