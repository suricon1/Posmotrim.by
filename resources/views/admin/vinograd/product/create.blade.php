@extends('admin.layouts.layout')

{{--@section('header')--}}
    {{--<link rel="stylesheet" href="/css/select2.min.css">--}}
{{--@endsection--}}

@section('title', 'Admin | Добавить сорт винограда')
@section('key', 'Admin | Добавить сорт винограда')
@section('desc', 'Admin | Добавить сорт винограда')

@section('header-title', 'Добавить сорт винограда')

@section('content')

    <div class="col">
        {{Form::open([
          'route'	=> 'products.store',
          'files'	=>	true,
          'id' => 'uploadImages',
          'data-redirect' => route('products.index')
      ])}}

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
                            <label for="exampleInputFile">Загрузить заглавное фото (Размер фото: 600х600 px. Макс. вес - 500Kb)</label>
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
                <button type="button" class="btn btn-tool" data-widget="collapse">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i>Название мета-данные</h3>
                </button>
            </div>
            <div class="card-body">
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
                    </div>
                    <input name="meta[title]" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('meta[title]')}}">
                </div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Название</span>
                    </div>
                    <input name="name" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('name'), isset($product) ? $product->meta['title'] : ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Алиас</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">http://vinograd.posmotrim.loc/product/</span>
                        </div>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="slug" value="{{old('slug')}}">
                        <div class="input-group-append">
                            <span class="input-group-text">.html</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Описание (description)</label>
                            <textarea name="meta[desc]" class="form-control" rows="3" placeholder="Мета-описание ...">{{old('meta[desc]')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ключевые слова (keywords)</label>
                            <textarea name="meta[key]" class="form-control" rows="3" placeholder="Ключевые слова ...">{{old('meta[key]')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--$value = old('value', 'default');--}}
        <div class="card card-default collapsed-card">
            <div class="card-header">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i>Статусы</h3>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id',
                                $categorys,
                                null,
                                [
                                    'class' => 'form-control select2',
                                    'style' => 'width: 100%',
                                    'id' => 'category',
                                    'placeholder' => 'Выбрать категорию'
                                ])
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Теги:</label>

                        </div>
                    </div>
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
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label>Основные характеристики</label>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Срок созревания</span>
                            </div>
                            <input name="ripening" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('ripening')}}">
                            <div class="input-group-append">
                                <span class="input-group-text">дней</span>
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Средняя масса грозди</span>
                            </div>
                            <input name="mass" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('mass')}}">
                            <div class="input-group-append">
                                <span class="input-group-text">грамм</span>
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Окраска</span>
                            </div>
                            <input name="color" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('color')}}">
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Вкус</span>
                            </div>
                            <input name="flavor" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('flavor')}}">
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Морозоустойчивость</span>
                            </div>
                            <input name="frost" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('frost')}}">
                            <div class="input-group-append">
                                <span class="input-group-text">&#8451;</span>
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Цветок</span>
                            </div>
                            <input name="flower" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{old('flower')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Модификации:</label>
                        <p>Модификации доступны при редактировании продукта</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default collapsed-card">
            <div class="card-header">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i>Галерея</h3>
                </button>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputFile">Загрузить фото в галерею (Размер фото: 600х600 px. Макс. вес - 500Kb)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{Form::file('gallery[]', ['multiple'=>true, 'accept'=>'image/*', 'class'=>'custom-file-input', 'id'=>'exampleGallery'])}}
                            <label class="custom-file-label" for="exampleGallery">Выберите фото</label>
                        </div>
                    </div>
                    <div>
                        <ul id="uploadImagesList">
                            <li class="item template">
                                <span class="img-wrap">
                                    <img src="" alt="">
                                </span>
                                <span class="delete-link" title="Удалить">Удалить</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="dropped-files"></div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i>Описание сорта и Антонация</h3>
                </button>
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
    <script src="/js/multiUploadViewt.js" ></script>
@endsection