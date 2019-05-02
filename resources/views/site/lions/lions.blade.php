@extends('layouts.site')

@section('title', $region->meta_title ?: $region->title)
@section('key', $region->meta_key)
@section('desc', $region->meta_desc)

@section('breadcrumb')
    <div class="breadcrumb-tow">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-title">
                        <h1>{{$region->title}}</h1>
                    </div>
                    <div class="breadcrumb-content breadcrumb-content-tow">
                        <ul>
                            <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            <li class="active">{{ $region->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    {{--<div class="section-title-img">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                    {{--<div class="section-title2">--}}
                        {{--<h1>{{$region->title}}</h1>--}}
                        {{--<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,--}}
                            {{--vel illum dolore <br>--}}
                            {{--eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui--}}
                            {{--blandit..</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="pricing-table-area service-bg-1 pt-120 pb-85 mb-110" style="background-image: url('../pics/region_BG/belarus.jpeg')">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="history-area-content p-2">--}}
                    {{--<h2>Беларусь - страна озер и лесов</h2>--}}

                    {{--<p>Этот раздел сайта posmotrim.by посвящён описанию <strong>достопримечательностей Беларуси</strong>, все самые красивые, популярные и интересные достопримечательности городов, сёл и природы Беларуси с фото и описанием Вы найдёте в этом разделе, а также мы расскажем Вам о том, как посетить их самостоятельно, воспользовавшись нашими советами и предоставленными картами маршрутов поездок. Белорусские достопримечательности занимают особое место в списках всех <a href="http://posmotrim.by">достопримечательностей мира</a>.</p>--}}

                    {{--<p>Каждый человек имеет свою родину, где он родился и вырос, где прошла его молодость... Для нас – это Беларусь.<br>--}}
                        {{--Это удивительная страна со своим интересным прошлым, наполненным <a href="http://posmotrim.by/section/belarus/legend.html">легендами </a>и деятельностью известных во всём мире людей; не менее интересно и настоящее нашей страны: ведь республика ещё становиться на новый путь своего исторического развития...<br>--}}
                        {{--Удивительна и прекрасна <a href="http://posmotrim.by/section/belarus/nature.html">природа Беларуси</a>. Бесконечная полоса лесов, лишь иногда прерываемая одиноким полем или целой цепью синих озёр, пленит любого, кто умеет ценить красоту окружающего мира.</p>--}}

                    {{----}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    @foreach($texts as $text)
    <div class="pricing-table-area service-bg-1 pt-5 pb-5 mb-110"@if($loop->iteration == 1) style="background-image: url('{{$region->getImage()}}')"@endif>
        {{--<div class="our-history-area mt-5">--}}
            <div class="container">
                <div class="history-area-content p-4">
                    {!! $text !!}
                </div>
            </div>
        {{--</div>--}}
    </div>
        @if($loop->iteration == 1)
            @include('site.lions.sity', ['countPostsByCity' => $countPostsByCity])
        @endif

        @if($loop->iteration == 2)
            @include('site.lions.galery', ['popularPostsByCountri' => $popularPostsByCountri])
        @endif

        @if($loop->iteration == 3)
            @include('site.lions.text_left')
        @endif

        @if($loop->iteration == 4)
            @include('site.lions.text_right')
        @endif
    @endforeach

@endsection