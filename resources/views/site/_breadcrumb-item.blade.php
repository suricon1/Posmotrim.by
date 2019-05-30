@if($region)
    @if($region->parent_id !== null)
        @include('site._breadcrumb-item', ['region' => $region->parent])
    @endif
    <li><a href="{{route('site.section', ['region' => $region->slug])}}">{{ $region->name }}</a></li>
@endif