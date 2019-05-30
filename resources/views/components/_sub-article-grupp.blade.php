<div class="testimonial-blog-area gray-bg pt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="testimonial-area-content">
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="section-title text-center">--}}
{{--                                <span></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <img src="{{asset($post->getImage())}}" alt="{{ $post->title }}" style="max-width: 100%;">
                </div>
            </div>
            <div class="col-md-5">
                <div class="blog-area-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <span>Связанные статьи</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="blog-list-slider-active">
                            @foreach($posts as $post)
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="{{asset($post->getImage('220x165'))}}" alt="{{ $post->title }}" style="max-width: 100%; ">
                                    </div>
                                    <div class="col-7">
                                        <h3 class="post-title"><a href="{{ route('site.article', ['alias' => $post->slug]) }}" tabindex="0">{{ $post->title }}</a></h3>
{{--                                        <p class="post-author">--}}
{{--                                            <span>Posted by </span>--}}
{{--                                            <a href="#" tabindex="0">{{ $post->author->name }}</a>--}}{{-- getRusDate($post->date_add) --}}
{{--                                        </p>--}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>