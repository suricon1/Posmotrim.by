@extends('layouts.site-left')

@section('title', 'Поиск по сайту: ')
@section('key', 'Поиск по сайту: ')
@section('desc', 'Поиск по сайту: ')

@section('header-style')
    .search_result li{
        list-style: none;
        padding: 5px 10px;
    }

    .search_result li:hover{
    }
@endsection

@section('breadcrumb-content')
    <li class="active">Поиск: </li>
@endsection

@section('left-content')

    <h2 class="mb-5">Результаты поиска по запросу: {{$query}}</h2>
    @if($posts->isNotEmpty())
    <div class="product-list-view">
        @foreach($posts as $post)
        <div class="product-list-item mb-4">
            <div class="row">
                <!--Single List Product Start-->
                <div class="col-md-3">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('site.article', ['alias' => $post->slug])}}">
                                <img src="{{ $post->getImage('220x165') }}" alt="">
                            </a>
                            {{--<span class="onsale">Sale!</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-content shop-list">
                        <h2><a href="{{route('site.article', ['alias' => $post->slug])}}">{!!strReplaceStrong($query, $post->title)!!}</a></h2>
                        <div class="product-description">
                            <p>{{$post->StrLimit($post->content, 300)}}</p>
                        </div>
                    </div>
                </div>
                <!--Single List Product End-->
            </div>
        </div>
        @endforeach
    </div>
    {{$posts->appends(['search' => $query])->links()}}

    @else
        <div class="alert alert-success">
            <h2>Отсутствуют результаты поиска!</h2>
            <p>Попробуйте другие варианты посковых фраз.</p>
            <div class="product-filter" style="background-color: #fff; padding: 10px;">
                <div class="search__sidbar">
                    <div class="input_form">
                        <form>
                            <input id="search_input" name="search" class="input_text who" type="text" placeholder="Поиск по сайту ..."  autocomplete="off">
                            <ul class="search_result"></ul>
                            <button id="blogsearchsubmit" type="submit" class="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection