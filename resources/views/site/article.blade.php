@extends('layouts.site-left')

@section('title', $post_info->title)
@section('key', $post_info->meta_key)
@section('desc', $post_info->meta_desc)

@section('breadcrumb-content')
    @include('site._breadcrumb-item', ['region' => $post_info->region])
    @include('site._breadcrumb_post_item', ['post' => $post_info->parent])
    <li class="active">{{ $post_info->title }}</li>
@endsection

@section('left-content')
    <!--Blog Post Start-->
    <div class="blog_area">
        <article class="blog_single blog-details">

            @foreach($posts as $post)

                @php
                    $subGrupp = $postRep::getSubPostsGrupp($post->id)
                @endphp

                <div class="post {{--!$loop->first && count($subGrupp)>0 ? ' bg-gray' : ''--}} pb-2">
                    <header class="entry-header">
                        {{--<span class="post-category">--}}
                        {{--<a href="single-blog.html#"> Fashion</a>,<a href="single-blog.html#">WordPress</a>--}}
                        {{--</span>--}}
                        @if($loop->first)
                            <h1 class="entry-title">{{ $post->title }}</h1>
                        @else
                            <a href="{{ route('site.article', ['alias' => $post->slug]) }}" name="{{ $loop->iteration }}">
                                <h2 class="entry-title">{{ $post->title }}</h2>
                            </a>
                        @endif
                        {{--<span class="post-author"><span class="post-by"> Posts by : </span> admin </span>--}}
                        {{--<span class="post-separator">|</span>--}}
                        {{--<span class="blog-post-date"><i class="fas fa-calendar-alt"></i>On March 10, 2018 </span>--}}
                    </header>
                    @if(!$loop->first && count($subGrupp)>0)
                        @include('components._sub-article-grupp', ['post' => $post, 'posts' => $subGrupp])
                    @else
                        <div class="post-thumbnail img">
                            <img src="{{asset($post->getImage())}}" alt="{{ $post->title }}">
                        </div>
                    @endif

                    @if($loop->first && count($posts) > 1)
                        @include('components.content', ['posts' => $posts])
                    @endif

                    <div class="postinfo-wrapper">
                        <div class="post-info">
                            <div class="entry-summary blog-post-description">
                                {{--                            {!! htmlspecialchars_decode($post->content) !!}--}}
                                {!! $post->content !!}
                                {{--{!! htmlspecialchars_decode(clean($post->content, [--}}
                                {{--'AutoFormat.AutoParagraph' => true,--}}
                                {{--'HTML.Allowed' => 'p,ul,li,b,i,a[href],pre,h1,h2,img[src]',--}}
                                {{--'HTML.SafeEmbed' => true,--}}
                                {{--"URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|www.google.com/maps/embed|player.vimeo.com/video/)%",--}}
                                {{--'AutoFormat.Linkify' => true,--}}
                                {{--'HTML.Nofollow' => false,--}}
                                {{--'Core.EscapeInvalidTags' => true,--}}
                                {{--])); !!}--}}
                            </div>
                        </div>
                    </div>

                    <span class="post-author"><span class="post-by"><i class="fa fa-user-o"></i> </span> {{ $post->author->name }} </span>
                    <span class="post-separator">|</span>
                    <span class="blog-post-date"><i class="fa fa-calendar-plus-o"></i> {{ getRusDate($post->date_add) }}</span>
                    <span class="post-separator">|</span>
                    <span class="post-author"><span class="post-by"><i class="fa fa-eye"></i> </span> {{ $post->prosmotr }} </span>
                    @admin
                    <span class="post-separator">|</span>
                    <span><a href="{{route('posts.edit', $post)}}">Редактировать</a></span>
                    @endadmin
                </div>
            @endforeach

            <div class="product-tag blog-tag mt-3">
                <ul>
                    @include('site._breadcrumb-item', ['region' => $post_info->region])
                    {{--<li><a href="{{ route('site.section', ['region' => $post_info->countri->slug]) }}">{{ $post_info->countri->name }}</a></li>--}}
                    {{--@if($post_info->city)--}}
                    {{--<li><a href="{{ route('site.section', ['region' => $post_info->city->slug]) }}">{{ $post_info->city->name }}</a></li>--}}
                    {{--@endif--}}
                    @if(count($post_info->tags) > 0)
                        @foreach($post_info->tags as $tag)
                            <li><a href="{{ route('site.section.tag', ['region' => $post_info->region->slug, 'tag' => $tag->slug]) }}">{{ $tag->title }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="social-sharing">
                <div class="widget widget_socialsharing_widget">
                    <h3 class="widget-title">Поделиться с друзьями</h3>
                    <ul class="blog-social-icons">
                        <li>
                            <a target="_blank" title="Facebook" href="single-blog.html#" class="facebook social-icon">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" title="twitter" href="single-blog.html#" class="twitter social-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" title="pinterest" href="single-blog.html#" class="pinterest social-icon">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" title="linkedin" href="single-blog.html#" class="linkedin social-icon">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </article>

        @if($related_posts)
            <div class="product-area mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center mb-3">
                                <span>Похожие статьи</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-slider-active">
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">

                                @foreach($related_posts as $post)
                                    <div class="relatedthumb">
                                        <div class="image img-full">
                                            <a href="{{ route('site.article', ['slug' => $post->slug]) }}"><img src="{{ asset($post->getImage('220x165')) }}" alt="{{ $post->title }}"></a>
                                        </div>
                                        <h4><a href="{{ route('site.article', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                                    </div>

                                    @if($loop->iteration % 2 == 0 && !$loop->last)
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <!--Comment Area Start-->
    <a name="comments"></a>
    <div class="comments-area mt-80" id="parent_coment">
        @if(count($comments) > 0)
            <h3>Коментарии:</h3>
            @include('components.comment-item', ['comments' => $comments])
        @else
            <h3 class="mt-5">Вы можете оставить первый комментарий к статье!</h3>
        @endif
    </div>
    <div class="comment-box mt-30 mb-40" id="form_add_comment">
        @include('components.comment-form', ['id' => $post_info->id, 'url' => route('ajax-comment.add')])
    </div>
    <!--Comment Area End-->

    <!--Blog Post End-->
    <!-- Modal commentErrorModal -->
    <div class="modal fade" id="commentErrorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ошибки при добавления комментария!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <ol id="commentErrors">

                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection