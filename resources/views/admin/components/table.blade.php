<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">

        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Страна</th>
            <th>Город</th>
            <th>Теги</th>
            <th>Картинка</th>
            <th>Действия</th>
        </tr>
        </thead>

        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->getCountriTitle()}}</td>
                <td>{{$post->getCityTitle()}}</td>
                <td>{{$post->getTagsTitles()}}</td>
                <td><img src="{{asset($post->getImage('220x165'))}}" alt="" width="100"></td>
                <td>
                    <div class="btn-group" id="nav">
                    @if($post->status == 1)
                        <a class="btn btn-outline-warning btn-sm" href="{{route('posts.toggle', ['id' => $post->id])}}" role="button"><i class="fa fa-lock"></i></a>
                    @else
                        <a class="btn btn-outline-success btn-sm" href="{{route('posts.toggle', ['id' => $post->id])}}" role="button"><i class="fa fa-thumbs-o-up"></i></a>
                    @endif
                        <a class="btn btn-outline-primary btn-sm" href="{{route('posts.edit', $post)}}" role="button"><i class="fa fa-pencil"></i></a>
                    @if($post->status != 1)
                        <a class="btn btn-outline-secondary btn-sm" href="{{route('site.article', ['alias' => $post->slug])}}" role="button" target="_blank">
                            <i class="fa fa-eye"></i>
                        </a>
                    @endif
                    @if(!$grups = $post->getGrupp($post->id))
                        {{Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'delete'])}}
                        <button onclick="return confirm('Подтвердите удаление Статьи!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                        {{Form::close()}}
                    @endif
                    </div>
                </td>
            </tr>

            @if($grups)
                @include('admin.components.grupp')
            @endif

        @endforeach

        </tbody>
    </table>
</div>