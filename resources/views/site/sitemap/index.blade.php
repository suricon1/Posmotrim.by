@extends('layouts.site-left')

@section('title', 'Карта сайта: Главная')
@section('key', 'Карта сайта: Главная')
@section('desc', 'Карта сайта: Главная')

@section('breadcrumb-content')
    <li class="active">Карта сайта: Главная</li>
@endsection

@section('left-content')
    <div class="row">
        @foreach($collect as $item)
        <div class="col">
            @foreach($item as $countri)
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-bottom: 5px">
                <button type="button" class="btn btn-light">
                    <a href="{{route('sitemap.countri', ['countri' => $countri->id])}}">{{ $countri->name }}</a>
                </button>

                @if($countri->citys->isNotEmpty())
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Города
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                        @foreach($countri->citys as $city)
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-bottom: 5px">
                                <button type="button" class="btn btn-light">
                                    <a class="dropdown-item" href="{{route('sitemap.city', ['city' => $city->id])}}">{{ $city->name }}</a>
                                </button>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Тэги
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Тэг 1</a>
                                        <a class="dropdown-item" href="#">Тэг 2</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                @endif

                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Тэги
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Тэг 1</a>
                        <a class="dropdown-item" href="#">Тэг 2</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endforeach

{{--@foreach($collect as $item)--}}
        {{--<ul class="list-group sitemap col">--}}

            {{--@foreach($item as $countri)--}}
                    {{--<li class="list-group-item">--}}
                        {{--<div class="btn-group">--}}
                            {{--<button type="button" class="btn btn-outline-secondary"><a href="{{route('sitemap.countri', ['countri' => $countri->id])}}">{{ $countri->name }}</a></button>--}}

                            {{--@if($countri->citys->isNotEmpty())--}}
                            {{--<button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<span class="sr-only">Toggle Dropdown</span>--}}
                            {{--</button>--}}
                            {{--<div class="dropdown-menu">--}}
                                {{--@foreach($countri->citys as $city)--}}
                                    {{--<a class="dropdown-item" href="{{route('sitemap.city', ['city' => $city->id])}}">{{ $city->name }}</a>--}}
                                {{--@endforeach--}}
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a class="dropdown-item" href="#">Separated link Separated link</a>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</li>--}}
            {{--@endforeach--}}

        {{--</ul>--}}
        {{--@endforeach--}}

    </div>
@endsection