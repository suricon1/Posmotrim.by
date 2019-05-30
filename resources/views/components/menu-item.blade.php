@if($items)
<li><a href="#">{{ $title }} <i class="fa fa-angle-down"></i></a>
    <ul class="mega-menu row">
        @foreach($items as $item)
            <div class="col">
                @foreach($item as $key => $value)
                    <li class="grouped-list">{{ $key }}</li>
                    @foreach($value as $slug => $name)
                        <li><a href="{{ $trig ? route('site.section.tag',['region' => $region->slug, 'tag' => $slug]) : route('site.section',['region' => $slug]) }}">{{ $name }}</a></li>
                    @endforeach
                @endforeach
            </div>
        @endforeach
    </ul>
</li>
@endif

{{--
Прикольная тема разбиение коллекции на сетку Botstrap.
Надо бы разобраться

Этот метод особенно полезен в шаблонах при работе с системой сеток, такой как Bootstrap.
Представьте, что у вас есть коллекция моделей Eloquent, которую вы хотите отобразить в сетке:
--}}

{{--@foreach ($products->chunk(3) as $chunk)--}}
    {{--<div class="row">--}}
        {{--@foreach ($chunk as $product)--}}
            {{--<div class="col-xs-4">{{ $product->name }}</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
{{--@endforeach--}}