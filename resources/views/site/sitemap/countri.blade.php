@extends('layouts.site-left')

@section('title', 'Карта сайта: Страна - ')
@section('key', 'Карта сайта: Страна - ')
@section('desc', 'Карта сайта: Страна - ')

@section('breadcrumb-content')
    <li class="active">Карта сайта: Страна - </li>
@endsection

@section('left-content')
            <ul class="list-group sitemap col">

                @foreach($posts as $post)
                    <li class="list-group-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary">
                                <a href="{{route('site.article', ['alias' => $post->slug])}}">{{ $post->title }}</a>
                            </button>

                            @if($grups = $post->getGrupp($post->id))
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach($grups as $item)
                                        <a class="dropdown-item" href="{{route('site.article', ['city' => $item->slug])}}">{{ $item->title }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach

            </ul>

            <div class="row">
                <div class="col-12">
                    <div class="product-pagination blog-pagenation">
                        {{$posts->links('components.pagination')}}
                    </div>
                </div>
            </div>
@endsection