<?php

namespace App\Http\Controllers\Vinograd;

use App\Models\Vinograd\Product;
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
            return ['succes' =>'ok'];
        }
        return ['error' =>'<div class="alert alert-danger" id="error"> Неправильный логин или пароль</div>'];
    }


    public function modalProduct(Request $request)
    {
        $this->validate($request, [
                'product_id'	=>	'required|integer|exists:vinograd_products,id'
            ],
            [
                'product_id.required' => 'Произошла ошибка. Перегрузите страницу и повторите попытку.',
                'product_id.integer' => 'Произошла ошибка. Перегрузите страницу и повторите попытку.',
                'product_id.exists' => 'Произошла ошибка. Перегрузите страницу и повторите попытку.'
            ]);

        $product = Product::find($request->get('product_id'));
        if(!$product){
            return ['error' =>'Произошла ошибка. Перегрузите страницу и повторите попытку.'];
        }

        return ['succes' => view('vinograd.components.modal-single-product', [
            'product' =>$product
        ])->render()];
    }
}