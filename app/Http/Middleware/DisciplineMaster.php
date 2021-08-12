<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisciplineMaster
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
        if(auth()->user()->role == "Discipline Master"){
            return $next($request);
          }
            return redirect('home')->with('error','You have not Discipline Master access');
    }
}
