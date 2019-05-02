@foreach($comments as $comment)
<ol class="commentlist" id="{{$comment['id']}}">
    <li>
        <div class="single-comment {{$comment['id']}}">
            <div class="comment-avatar">
{{--                {{dd(count($comment['author']))}}--}}
            @if($comment['author'])
                <img src="/img/avatar/{{ $comment['author']['avatar'] }}">
            @else
                <img src="https://www.gravatar.com/avatar/{{md5($comment['comment_author']['email'])}}?d=mm&s=75">
            @endif

            </div>
            <div class="comment-info">
{{--                {{dd($comment)}}--}}

            @if($comment['author'])
                <h4>{{ $comment['author']['name'] }}</h4>
            @else
                <h4>{{ $comment['comment_author']['name'] }}</h4>
            @endif

                <div class="reply">
                    <button type="button" class="btn btn-sm btn-outline-success reply_comment">
                        <i class="fa fa-comment-o d-sm-none"></i>
                        <span class="d-none d-sm-block">Ответить</span>
                    </button>

                @auth
                @if(Auth::user()['role'] == 3 || Auth::user()->id == $comment['user_id'])
                    <button type="button" class="btn btn-sm btn-outline-primary edit_comment">
                        <i class="fa fa-pencil-square-o d-sm-none"></i>
                        <span class="d-none d-sm-block">Редактировать</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger delete_comment">
                        <i class="fa fa-times d-sm-none"></i>
                        <span class="d-none d-sm-block">Удалить</span>
                    </button>
                @endif
                @endauth

                </div>
                <span class="date">{{ getRusDate($comment['date_coment']) }}</span>
                <p>{{ $comment['text'] }}</p>
            </div>
        </div>
        @if(isset($comment['childs']))
            @include('components.comment-item', ['comments' => $comment['childs']])
        @endif
    </li>
</ol>
@endforeach