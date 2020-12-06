<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('token')=='admin'){
//            return 'Is Admin';

            return $next($request);
        }
        else if($request->has('token')){
            return redirect('/home');
        }
        return redirect('/login');
    }
}
