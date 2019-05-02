@extends('admin.layouts.layout')

@section('title', 'Admin | Редактировать мета-данные тэга')
@section('key', 'Admin | Редактировать мета-данные тэга')
@section('desc', 'Admin | Редактировать мета-данные тэга')

@section('header-title', 'Редактировать мета-данные тэга')

@section('content')
    <div class="col-md-10">
        {!! Form::open(['route' => ['tag_desc.update', $tagDesc->id], 'method' => 'put']) !!}
        <div class="form-group">
            <label for="title"><i class="fa fa-exclamation-triangle nav-icon text-danger"></i> Заголовок</label>
            <input type="text" class="form-control" id="title" placeholder="" name="title" value="{{$tagDesc->title}}">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><i class="fa fa-exclamation-triangle nav-icon text-danger"></i> Страна</label>
                    {{Form::select('countri_id',
                        $countris,
                        $tagDesc->countri_id,
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
                        $tagDesc->city_id,
                        [
                            'class' => 'form-control select2',
                            'style' => 'width: 100%',
                            'placeholder' => '-- Выберите город --',
                            'id' => 'city'
                        ])
                    }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label> <i class="fa fa-exclamation-triangle nav-icon text-danger"></i> Тэг</label>
            {{Form::select('tag_id',
              $tags,
              $tagDesc->tag_id,
              [
                  'class' => 'form-control select2',
                  'placeholder' => '-- Выберите Тэг --'
              ])
            }}
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea name="text" id="text" class="form-control">{{$tagDesc->text}}</textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_key">Описание (description)</label>
                    <textarea name="meta_desc" class="form-control" rows="3" placeholder="Мета-описание ...">{{$tagDesc->meta_desc}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ключевые слова (keywords)</label>
                    <textarea name="meta_key" class="form-control" rows="3" placeholder="Ключевые слова ...">{{$tagDesc->meta_key}}</textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-success">Обновить</button>
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