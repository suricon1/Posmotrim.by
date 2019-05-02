@extends('emails.comment_layout')

@section('content')
<table width="540" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <h2 style="color: #9faf78; font-size: 30px; margin-bottom: 10px; font-family: Georgia, 'Times New Roman', Times, serif; padding: 0;">К Вашей статье на сайте Posmotrim.by оставлен комментарий!</h2>
            <a style="color: #9faf78; font-size: 20px; margin-bottom: 10px; font-family: Georgia, 'Times New Roman', Times, serif; padding: 0;" href="{{ route('site.article', ['alias' => $post->slug]) }}">
                <img src="{{asset($post->getImage(true))}}">
            </a>
            <h3>
                <a style="color: #9faf78; font-size: 20px; margin-bottom: 10px; font-family: Georgia, 'Times New Roman', Times, serif; padding: 0;" href="{{ route('site.article', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
            </h3>
            <p style="font-size: 13px;  color: #686f64; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif; padding: 0;">Текст комментария: <strong>{{ $comment->text }}</strong></p>
        </td>
    </tr>
</table>
@endsection