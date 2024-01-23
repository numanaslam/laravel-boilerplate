<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticated   //@na
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
