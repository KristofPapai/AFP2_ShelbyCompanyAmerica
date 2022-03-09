<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class GuestMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check())
            return redirect('/');

        return $next($request);
    }
}
