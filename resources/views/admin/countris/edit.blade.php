@extends('admin.layouts.layout')

@section('title', 'Admin | Редактировать страну')
@section('key', 'Admin | Редактировать страну')
@section('desc', 'Admin | Редактировать страну')

@section('header-title', 'Редактировать страну')

@section('content')

    <div class="col">
        {!! Form::open([
            'route'  => ['countri.update', $countri->id],
            'method' => 'put',
            'files'	 =>	true])
        !!}

        <div class="card card-default collapsed-card">
            <div class="card-header">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i>Заглавное фото</h3>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"  id="error_img">
                        <img src="{{$countri->getImage('200x100')}}" id="image_preview" alt="" class="img-responsive" width="200">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="exampleInputFile">Загрузить заглавное фото статьи (Размер фото (min): 1920х945 px.)</label>
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
                <span class="input-group-text">Название (В меню)</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" id="name" name="name" value="{{old('name', $countri->name)}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Алиас</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" id="slug" name="slug" value="{{old('slug', $countri->slug)}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Title страницы</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" id="meta_title" placeholder="" name="meta_title" value="{{old('title', $countri->meta_title)}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Заголовок (H1)</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" id="title" name="title" value="{{old('title', $countri->title)}}">
        </div>
        <div class="form-group">
            <label for="text">Текст. Для разделения блоков вставлять код %@==@%</label>
            <textarea name="text" id="text" class="form-control">{!! old('text', $countri->text) !!}</textarea>
        </div>
        <div class="form-group">
            <label>
                {{Form::checkbox('is_lions', '1', $countri->is_lions, ['class'=>'minimal'])}}
            </label>
            <label>
                Преобразована в посадочную страницу.
            </label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_key">Описание (description)</label>
                    <textarea name="meta_desc" class="form-control" rows="3" placeholder="Мета-описание ...">{{old('meta_desc', $countri->meta_desc)}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ключевые слова (keywords)</label>
                    <textarea name="meta_key" class="form-control" rows="3" placeholder="Ключевые слова ...">{{old('meta_key', $countri->meta_key)}}</textarea>
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