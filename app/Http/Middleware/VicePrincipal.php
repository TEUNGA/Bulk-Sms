<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VicePrincipal
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
        if(auth()->user()->role == "Vice Principal"){
            return $next($request);
          }
            return redirect('home')->with('error','You have not Vice Principal access');
    }
}
