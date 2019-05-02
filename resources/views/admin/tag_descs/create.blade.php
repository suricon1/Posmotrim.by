@extends('admin.layouts.layout')

@section('title', 'Admin | Добавить мета-данные тэга')
@section('key', 'Admin | Добавить мета-данные тэга')
@section('desc', 'Admin | Добавить мета-данные тэга')

@section('header-title', 'Добавить мета-данные тэга')

@section('content')

    <div class="col-md-10">
        {!! Form::open(['route' => 'tag_desc.store']) !!}
        <div class="form-group">
            <label for="title">Заголовок (H1)</label>
            <input type="text" class="form-control" id="title" placeholder="" name="title" value="{{old('title')}}">
        </div>
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
            <label>Город</label>
            {{Form::select('tag_id',
              $tags,
              null,
              [
                  'class' => 'form-control select2',
                  'placeholder' => 'Выберите тэг'
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