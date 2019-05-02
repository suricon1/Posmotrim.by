<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $post->title or 'Письмо отправлено с сайта Posmotrim.by' }}</title>
    <!--[if gte mso 9]>
    <style type="text/css">
        .body{background: #353732 url({{asset('img/email/body-bg.jpg')}});}
        .case {background:none;}
    </style>
    <![endif]-->
</head>
<body style="background-color: #8e998b; background-image: url({{asset('img/email/body-bg.jpg')}}); background-repeat: repeat;" class="body" marginheight="0" topmargin="0" marginwidth="0" leftmargin="0">
<!--100% body table-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="case" style="background-color: #8e998b; background-image: url({{asset('img/email/body-bg.jpg')}}); background-repeat: repeat;">
            <!--[if gte mso 9]>
            <td style="background: none;">
            <![endif]-->
            <!--header text-->
            <table id="top" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="80" style="background-image: url({{asset('img/email/box-bg.jpg')}}); background-repeat: repeat;" background="{{asset('img/email/box-bg.jpg')}}" valign="middle" align="center">
                                    <p style="font-size: 13px;  color: #fff; font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;">Это письмо сгенерировано автоматически.<br>Не отвечайте на него.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--/header text-->
            <!--masthead-->
            <table bgcolor="#e5e7e2" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background-image: url({{asset('img/email/masthead.jpg')}}); background-repeat: no-repeat;" background="{{asset('img/email/masthead.jpg')}}" valign="top" height="104">

                        <!--date-->
                        <table width="95" border="0" align="right" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="top" bgcolor="#bac893" background="{{asset('img/email/date-bg.jpg')}}" style="background-image:url({{asset('img/email/date-bg.jpg')}}); background-repeat: no-repeat;" height="87" width="62">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="62" valign="top" height="12" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="62" height="22" align="center"><p style="color:#FFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 0; padding: 0;"><currentday> </p></td>
                                        </tr>
                                        <tr>
                                            <td width="62" align="center"><p style="color:#FFF; font-size:9px; font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;"><currentmonthname></p></td>
                                        </tr>
                                    </table>

                                </td>
                                <td height="87" width="32">&nbsp;</td>
                            </tr>
                        </table>
                        <!--/date-->
                        <!--title-->
                        <table width="450" border="0" cellspacing="0" cellpadding="00">
                            <tr>
                                <td width="30"></td>
                                <td height="25"></td>
                            </tr>
                            <tr>
                                <td width="30">&nbsp;</td>
                                <td><a style="text-decoration: none;" href="{{route('home')}}"><h1 style="color: #547159; font-size: 48px; text-shadow: 1px 1px 1px #fff; font-family: Georgia, 'Times New Roman', Times, serif; margin: 0; padding: 0;">Posmotrim.by</h1></a></td>
                            </tr>
                        </table><!--/title-->
                    </td>
                </tr>
            </table><!--/masthead-->
            <!--top intro-->
            <table bgcolor="#e5e7e2" background="{{asset('img/email/content-bg.jpg')}}" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="35">
                        <!--break-->
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="30">&nbsp;</td>
                            </tr>
                        </table><!--/break-->

                        @yield('content')

                    </td>
                </tr>
            </table><!--/top intro-->
            <!--line-->
            <table bgcolor="#e5e7e2" background="{{asset('img/email/content-bg.jpg')}}" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td valign="top" align="center" height="25"><img src="{{asset('img/email/line_1.gif')}}" width="538" height="11"><img src="{{asset('img/email/line_1.gif')}}"></td>
                </tr>
            </table><!--/line-->

            @isset($newPosts)
                <!--content section-->
                <table bgcolor="#e5e7e2" background="{{asset('img/email/content-bg.jpg')}}" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <table width="540" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td colspan="2">
                                        <h2 style="color: #9faf78; font-size: 30px; margin-bottom: 10px; font-family: Georgia, 'Times New Roman', Times, serif; padding: 0;">Новинки нашего сайта. Возможно Вам будет интересно.</h2>
                                    </td>
                                </tr>
                                <tr>
                                @foreach($newPosts as $post)
                                    <td align="center">
                                        <a href="{{ route('site.article', ['slug' => $post->slug]) }}"><img src="{{asset($post->getImage(true))}}"></a>
                                        <h3><a style="color: #9faf78; font-size: 20px; margin-bottom: 10px; font-family: Georgia, 'Times New Roman', Times, serif; padding: 0; font-weight: 100;" href="{{ route('site.article', ['alias' => $post->slug]) }}">{{ $post->title }}</a></h3>
                                    </td>
                                    @if($loop->iteration == 2)
                                        </tr>
                                        <tr>
                                    @endif

                                @endforeach
                                </tr>
                            </table>
                            <!--break-->
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="20">&nbsp;</td>
                                </tr>
                            </table><!--/break-->
                        </td>
                    </tr>
                </table><!--/content section-->
            @endisset

            <!--footer-->
            <table style="background-image: url({{asset('img/email/box-bg.jpg')}}); background-repeat: repeat;" background="{{asset('img/email/box-bg.jpg')}}" width="600" border="0" align="center" cellpadding="20" cellspacing="0">
                <tr>
                    <td valign="top">
                        <p style="color: #FFF; font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;"><unsubscribe style="color:#dee7c6; text-decoration: underline;">Отписаться.</unsubscribe></p>
                    </td>
                </tr>
            </table><!--footer-->
            <!--break-->
            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="25">&nbsp;</td>
                </tr>
            </table><!--/break-->
        </td>
    </tr>
</table><!--/100% body table-->
</body>
</html>