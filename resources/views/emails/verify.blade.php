@extends('emails.comment_layout')

@section('content')
    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <h2 style="color: #9faf78; font-size: 30px; margin-bottom: 10px; font-family: Georgia, 'Times New Roman', Times, serif; padding: 0;">Кликните по ссылке ниже что бы подтвердить Ваш Email-адрес.<br>Спасибо</h2>
                <a href="{{ route('verify', ['token' =>$subs->token])}}">Подтвердить Email</a>
            </td>
        </tr>
    </table>
@endsection
