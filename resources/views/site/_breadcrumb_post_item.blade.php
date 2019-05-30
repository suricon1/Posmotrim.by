@if($post)
    @if($post->parent !== null)
        @include('site._breadcrumb_post_item', ['post' => $post->parent])
    @endif
    <li><a href="{{route('site.article', ['alias' => $post->slug])}}">{{ $post->title }}</a></li>
@endif
