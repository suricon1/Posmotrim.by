<?php

namespace App\Http\Controllers\Site;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AjaxController extends Controller
{

    protected $layout = false;

    public function loginForm()
    {
        return view('components.login-form');
    }

    public function login(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email'	=>	'required|email',
            'password'	=>	'required'
        ]);
        if ($v->fails())
        {
            return ['errors' => $v->errors()];
        }
        if(Auth::attempt([
                'email'	=>	$request->get('email'),
                'password'	=>	$request->get('password')
            ], $request->filled('remember')))
        {
            $user = Auth::user();
            if ($user->isWait()) {
                Auth::logout();
                return ['error' =>'<div class="alert alert-danger" id="error">Вам закрыт вход на сайт! Это может быть по двум причинам:<br>
                                                    1) Вы не подтвердили свой Email. Проверьте свою электронную почту и нажмите на ссылку, чтобы подтвердить email.<br>
                                                    2) Ваш аккаунт был заблокирован. Обратитесь к администратору сайта.</div>'];
            }
            return ['succes' =>'ok'];
        }
        return ['error' =>'<div class="alert alert-danger" id="error"> Неправильный логин или пароль</div>'];
    }
}
