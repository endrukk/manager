<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( intval($request->user()->role_id) <= 0 ) {
            /*user has no role*/
            return redirect(route('home'));
        }

        return $next($request);
    }

}