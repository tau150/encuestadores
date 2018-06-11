<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class checkProfile
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
        $path = $request->path();
        $loggedIn = Auth::check();

        if (! $loggedIn){
            return redirect('/login');
        }

        if( Auth::user()->role->nombre != 'superadmin' ){
            return redirect('/encuestadores');
        }

        return $next($request);



    }
}