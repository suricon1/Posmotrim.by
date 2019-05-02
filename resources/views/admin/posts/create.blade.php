@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('title', 'Admin | Добавить пост')
@section('key', 'Admin | Добавить пост')
@section('desc', 'Admin | Добавить пост')

@section('header-title', 'Добавить пост')

@section('content')

<div class="col">
    {{Form::open([
      'route'	=> 'posts.store',
      'files'	=>	true
  ])}}

    <div class="card card-default collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Заглавное фото</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" id="error_img">
                    <img src="/img/post_default.png" id="image_preview" class="img-responsive" width="200">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="exampleInputFile">Загрузить заглавное фото статьи (Какое-нибудь уведомление о форматах)</label>
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

    <div class="card card-default collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Название мета-данные</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
                </div>
                <input name="meta_title" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('meta_title')}}">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing1-sm">Название</span>
                </div>
                <input name="title" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing1-sm" value="{{old('title')}}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Описание (description)</label>
                        <textarea name="meta_desc" class="form-control" rows="3" placeholder="Мета-описание ...">{{old('meta_desc')}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ключевые слова (keywords)</label>
                        <textarea name="meta_key" class="form-control" rows="3" placeholder="Ключевые слова ...">{{old('meta_key')}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--$value = old('value', 'default');--}}
    <div class="card card-default collapsed-card">
        <div class="card-header">
            <h3 class="card-title">География и статусы</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Страна</label>
                        {{Form::select('countri_id',
                          $countris,
                          null,
                          [
                            'class' => 'form-control select2',
                            'placeholder' => '-- Выберите из списка --',
                            'style' => 'width: 100%',
                            'id' => 'region'
                          ])
                        }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Город</label>
                        <select id="city" name="city_id" disabled="disabled" class="form-control select2" style="width: 100%;">
                            <option value="0">-- Выберите из списка --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Теги</label>
                {{Form::select('tags[]',
                  $tags,
                  null,
                  [
                      'class' => 'form-control select2',
                      'multiple'=>'multiple',
                      'data-placeholder'=>'Выберите теги',
                      'style' => 'width: 100%'
                  ])
                }}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><input type="checkbox" class="minimal" name="is_featured"></label>
                        <label>Рекомендовать</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><input type="checkbox" class="minimal" name="status"></label>
                        <label>Черновик</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Текст статьи и Антонация</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group" id="editor">
                <label for="exampleInputEmail1">Полный текст</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Антонация</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <button class="btn btn-success">Добавить</button>
    </div>
    {{Form::close()}}

</div>

@endsection

@section('scripts')
    <script src="/js/select2.full.min.js"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckfinder/ckfinder.js"></script>
    <script>
        var editor = CKEDITOR.replace('content');
        editor.config.height = '600px';
        // CKFinder.setupCKEditor( editor );
        var editor2 = CKEDITOR.replace('description');

        $('.select2').select2();
    </script>
@endsection