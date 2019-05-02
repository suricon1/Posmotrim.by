<?php
namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session_id() == '') {
            @session_start();
        }

        if(is_admin())
        {
            $_SESSION['isLoggedIn'] = true;
            return $next($request);
        }
        abort(404);
    }
}