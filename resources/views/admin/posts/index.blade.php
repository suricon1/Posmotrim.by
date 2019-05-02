@extends('admin.layouts.layout')

@section('title', 'Admin | Список постов')
@section('key', 'Admin | Список постов')
@section('desc', 'Admin | Список постов')

@section('header-title', 'Список постов')

@section('content')

    <div class="col">
        <div class="form-group">
            <a href="{{route('posts.create')}}" class="btn btn-success">Добавить новую статью</a>
        </div>


        <div class="card card-default collapsed-card">
            <div class="card-header">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i>Поиск и сортировка</h3>
                </button>
            </div>
            <div class="card-body" style="display: none;">
                <form action="?" method="GET">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="formGroupExampleInput">ID</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="id"
                                       value="{{ request('id') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputGroupSelect1">Название</label>
                                <input type="text" class="form-control" id="inputGroupSelect1" name="title"
                                       value="{{ request('title') }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Страна</label>
                                {{Form::select('countri_id',
                                  $countrys,
                                  request('countri_id'),
                                  [
                                    'class' => 'form-control select2',
                                    'placeholder' => '-- --',
                                    'id' => 'region'
                                  ])
                                }}
                            </div>
                            <div class="form-group">
                                <label>Город</label>
                                {{Form::select('city_id',
                                    $citys,
                                    request('city_id'),
                                    [
                                        'class' => 'form-control select2',
                                        'placeholder'=>'-- --',
                                        'id' => 'city'
                                    ])
                                }}
                            </div>
                            <div class="form-group">
                                <label>Тэг</label>
                                {{Form::select('tag',
                                    $tags,
                                    request('tag'),
                                    [
                                    'class' => 'form-control',
                                    'placeholder' => '-- --'
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Сортировать по:</label>
                                {{Form::select('field',
                                    [
                                        'id'       => 'ID',
                                        'date_add' => 'Дате публикации',
                                        'prosmotr' => 'Популярности',
                                        'title'    => 'Названию'
                                    ],
                                    request('field'),
                                    [
                                        'class' => 'form-control'
                                    ])
                                }}
                            </div>
                            <div class="form-group">
                                <label>Направление</label>
                                {{Form::select('order_by',
                                    [
                                        'desc' => 'По убыванию',
                                        'asc' => 'По возрастанию'
                                    ],
                                    request('order_by'),
                                    [
                                        'class' => 'form-control'
                                    ])
                                }}
                            </div>
                            <div class="form-group float-right">
                                <label>&nbsp;</label><br/>
                                <button type="submit" class="btn btn-primary">Найти</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('admin.components.table', ['posts' => $posts])

        {{$posts->links('admin.components.pagination')}}

    </div>

@endsection