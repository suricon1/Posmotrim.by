<!--Our Service Area Start-->
<div class="our-service-area-2 mb-110">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12 mb-3 mt-3 text-center">
                <h2>{{$region->name}}. Самые популярные достопримечательности</h2>
                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,
                vel illum dolore <br>
                eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui
                blandit..</p>
            </div>
        </div>
        <div class="row no-gutters">

        @foreach($popularPostsByCountri as $post)
            <div class="col-lg-4 col-md-6">
                <a href="{{route('site.article', ['alias' => $post->slug])}}">
                    <div class="single-service-4">
                        <div class="service-img img-full">
                            <img src="{{$post->getImage('660x495')}}" alt="">
                        </div>
                        <div class="service-box">
                            <div class="service-icon4">
                                <i class="fa fa-sun-o"></i>
                            </div>
                            <div class="service-content-4">
                                <h2>{{$post->title}}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

        </div>
    </div>
</div>