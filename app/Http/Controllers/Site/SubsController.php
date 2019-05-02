<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site\Subscription;
use App\Mail\SubscribeEmail;
use Illuminate\Http\Request;
use Mail;
use Validator;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $v = Validator::make($request->all(), [
    		'email'	=>	'required|email|unique:subscriptions'
    	]);
        if ($v->fails())
        {
            return ($request->ajax()) ? ['errors' => $v->errors()] : redirect()->back()->withErrors($v->errors());
        }
    	
    	$subs = Subscription::add($request->get('email'));
        $subs->generateToken();
        
//    	Mail::to($subs)->send(new SubscribeEmail($subs));
    	Mail::to($subs)->queue(new SubscribeEmail($subs));

        if($request->ajax())
        {
            return ['succes' => 'На указанный Email отправлено письмо. Проверьте почту!'];
        }
    	return redirect()->back()->with('status','Проверьте вашу почту!');
    }

    public function verify($token)
    {
    	$subs = Subscription::where('token', $token)->firstOrFail();
    	$subs->token = null;
    	$subs->save();
    	return redirect('/')->with('status', 'Ваша почта подтверждена!СПАСИБО!');
    }
}
