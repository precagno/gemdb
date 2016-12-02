<?php

namespace App\Http\Middleware;

use Closure;

class NotAjax
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
        if(!$request->ajax())
        {    
            return redirect()->route("home.index");
        }
        
        return $next($request);
    }
}
