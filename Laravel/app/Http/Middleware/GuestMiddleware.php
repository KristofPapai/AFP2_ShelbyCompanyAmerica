<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class GuestMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()==true)
            return redirect('/');

        return $next($request);
    }
}
