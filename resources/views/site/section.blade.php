@extends('layouts.site-left')

@section('title', $section_info->title)
@section('key', $section_info->meta_key)
@section('desc', $section_info->meta_desc)

@section('breadcrumb-content')
    @if(!$postRep->tag)
        @include('site._breadcrumb-item', ['region' => $postRep->_region->parent])
        <li class="active">{{ $postRep->_region->name }}@if($page) Страница - {{$page}}@endif</li>
    @else
        @include('site._breadcrumb-item', ['region' => $postRep->_region])
        <li class="active">{{ $postRep->tag->title }}</li>
    @endif
@endsection

@section('section-title')
    @include('components.section-title', ['title' => $section_info->title])
@endsection

@section('left-content')
    <!--Blog Post Start-->
    @if($posts->isNotEmpty())
        <div class="shop-topbar-wrapper">
            <form action="?" method="GET">
                <div class="toolbar-short-area row">
                    <div class="input-group col-md-8">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Сортировать по:</span>
                        </div>
                        {{Form::select('field',
                            [
                                'date_add' => 'Дате публикации',
                                'title'    => 'Названию',
                                'prosmotr' => 'Популярности'
                            ],
                            request('field'),
                            [
                                'class' => 'custom-select'
                            ])
                        }}
                        {{Form::select('order_by',
                            [
                                'desc' => 'По убыванию',
                                'asc' => 'По возрастанию'
                            ],
                            request('order_by'),
                            [
                                'class' => 'custom-select'
                            ])
                        }}
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="show-product col-md-4 text-right">Показаны: {{$posts->firstItem()}} - {{$posts->lastItem()}} из {{$posts->total()}} статей</div>
                </div>
            </form>
        </div>

        <div class="blog_area">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-6">
                        <article class="blog_single">
                            <header>
                                <h2 class="entry-title">
                                    <a href="{{ route('site.article', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
                                </h2>
                            </header>
                            <div class="post-thumbnail img-full">
                                <a href="{{ route('site.article', ['alias' => $post->slug]) }}">
                                    <img src="{{asset($post->getImage('660x495'))}}" alt="{{ $post->title }}">
                                </a>
                                <div class="post-info-bloc">
                                    <div class="post-date">
                                        <div class="date">{{ getRusDate($post->date_add, 'd %MONTH% Y') }}</div>
                                    </div>
                                    <div class="post-comments-count">
                                        <i class="fa fa-eye"></i>{{ $post->prosmotr }}
                                        <a href="{{ route('site.article', ['alias' => $post->slug]) }}"
                                           title="Открыть комментарии">
                                            <i class="fa fa-comments-o"></i>{{ $post->comments->count() }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="postinfo-wrapper">
                                <div class="post-info">
                                    <div class="entry-summary">
                                        <p>
                                            @if($post->description)
                                                {!! $post->description !!}
                                            @else
                                                {{ $post->StrLimit($post->content, 400) }}
                                            @endif
                                        </p>
                                        <a href="{{ route('site.article', ['alias' => $post->slug]) }}"
                                           class="form-button">Читать статью</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-pagination blog-pagenation">
                    {{$posts->onEachSide(2)->links('components.pagination', ['param' => $param])}}
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    <h2>В этой категории отсутствуют материалы!</h2>
                    <p>Вы можете воспользоваться формой ниже для поиска другой полезной и интересной информации на
                        сайте.</p>
                    <div class="product-filter" style="background-color: #fff; padding: 10px;">
                        <div class="search__sidbar">
                            <div class="input_form">
                                <form>
                                    <input id="search_input" name="search" class="input_text" type="text"
                                           placeholder="Поиск по сайту ...">
                                    <button id="blogsearchsubmit" type="submit" class="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--Blog Post End-->
@endsection