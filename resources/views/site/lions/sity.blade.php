<div class="service-item-area mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 mt-3 text-center">
                <h2>{{$region->name}}. Достопримечательности по городам</h2>
            </div>
        </div>
        <div class="row">

            @foreach($countPostsByCity as $items)
                <div class="col-md-4">
                    <div class="categories-img img-full mb-30">
                        <a href="{{route('site.section', ['region' => $items->city_slug])}}"><img src="/site/img/category/home1-category-2.jpg" alt=""></a>
                        <div class="categories-content">
                            <h3>{{$items->city_name}}</h3>
                            <h4>{{$items->posts_count}} Постов</h4>
                        </div>
                    </div>

                    {{--<div class="single-service-item">--}}
                    {{--<div class="service-img img-full mb-35">--}}
                    {{--<img src="/site/img/service/service1.jpg" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="service-content">--}}
                    {{--<div class="service-title">--}}
                    {{--<h4>{{$items->city_name}}</h4>--}}
                    {{--</div>--}}
                    {{--<p>Постов: {{$items->posts_count}}</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>

                @if($loop->iteration % 3 == 0 && !$loop->last)
        </div>
        <div class="row">
            @endif

            @endforeach

        </div>
        <div class="faq-accordion ">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            {{$region->name}}. Открыть все города
                        </span>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body row">
                            @foreach ($region->children->chunk(ceil(count($region->children)/3)) as $chunk)
                                <div class="col-4">
                                    <ul class="link">
                                        @foreach ($chunk as $city)
                                            <li><a href="{{route('site.section', ['region' => $city->slug])}}">{{$city->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>