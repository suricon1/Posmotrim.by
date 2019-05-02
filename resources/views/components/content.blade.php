<div class="row justify-content-end mb-5">
    <h3>Содержание:</h3>
    <div class="col-lg-6 col-md-12">

    </div>
    <div class="col-lg-6 col-md-12">
        <nav>
            <ul class="list-group" style="text-align: left;">
                @foreach($posts as $post)
                    <li class="list-group-item"><i class="fa fa-circle-thin"></i><a href="#{{ $loop->iteration }}">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>