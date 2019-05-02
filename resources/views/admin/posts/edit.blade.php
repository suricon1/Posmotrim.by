@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('title', 'Admin | Редактировать пост')
@section('key', 'Admin | Редактировать пост')
@section('desc', 'Admin | Редактировать пост')

@section('header-title', 'Редактировать пост')

@section('content')

    <div class="col">

        {{Form::open([
            'route'	=>	['posts.update', $post->id],
            'files'	=>	true,
            'method'	=>	'put'
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
                    <div class="col-md-3"  id="error_img">
                        <img src="{{ asset($post->getImage('220x165')) }}" id="image_preview" alt="" class="img-responsive" width="200">
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
                <h3 class="card-title">Название и мета-данные</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
                    </div>
                    <input name="meta_title" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('meta_title', $post->meta_title)}}">
                </div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Название</span>
                    </div>
                    <input name="title" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('title', $post->title)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Алиас</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">http://vinograd.posmotrim.loc/product/</span>
                        </div>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="slug" value="{{old('slug', $post->slug)}}">
                        <div class="input-group-append">
                            <span class="input-group-text">.html</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Описание (description)</label>
                            <textarea name="meta_desc" class="form-control" rows="3" placeholder="Мета-описание ...">{{old('meta_desc', $post->meta_desc)}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ключевые слова (keywords)</label>
                            <textarea name="meta_key" class="form-control" rows="3" placeholder="Ключевые слова ...">{{old('meta_key', $post->meta_key)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                $post->getCountriID(),
                                [
                                    'class' => 'form-control select2',
                                    'style' => 'width: 100%',
                                    'id' => 'region'
                                ])
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Город</label>
                            {{Form::select('city_id',
                                $citys,
                                $post->getCityID(),
                                [
                                    'class' => 'form-control select2',
                                    'style' => 'width: 100%',
                                    'placeholder'=>'-- Выберите Город --',
                                    'id' => 'city'
                                ])
                            }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Теги</label>
                    {{Form::select('tags[]',
                        $tags,
                        $selectedTags,
                        [
                            'class' => 'form-control select2',
                            'multiple'=>'multiple',
                            'data-placeholder'=>'-- Выберите теги --',
                            'style' => 'width: 100%'
                        ])
                    }}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                {{Form::checkbox('is_featured', '1', $post->is_featured, ['class'=>'minimal'])}}
                            </label>
                            <label>
                                Рекомендовать
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                {{Form::checkbox('status', '1', $post->status, ['class'=>'minimal'])}}
                            </label>
                            <label>
                                Черновик
                            </label>
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
                    <textarea name="content" id="content">{{old('content', $post->content)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Антонация</label>
                    <textarea name="description" id="description">{{old('description', $post->description)}}</textarea>
                </div>
            </div>
        </div>

        <button class="btn btn-warning mb-3">Изменить</button>

        {{Form::close()}}
    </div>
@endsection

@section('scripts')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckfinder/ckfinder.js"></script>
    <script src="/js/select2.full.min.js"></script>
    <script>
        var editor = CKEDITOR.replace('content');
        editor.config.height = '600px';
        CKFinder.setupCKEditor( editor );
        var editor2 = CKEDITOR.replace('description');

        $('.select2').select2();
    </script>
@endsection