<?php

namespace App\Http\Controllers\Vinograd;

use App\Http\Controllers\Controller;
use App\Models\Site\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('site.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required',
            'email'	=>	'required|email|unique:users',
            'password'	=>	'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('site.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email',
            'password'	=>	'required'
        ]);
        //$remember = $this->request->input('remember') ? true : false;
        if(Auth::attempt([
            'email'	=>	$request->get('email'),
            'password'	=>	$request->get('password')
        ], $request->filled('remember')))
        {
            return redirect()->back();
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
