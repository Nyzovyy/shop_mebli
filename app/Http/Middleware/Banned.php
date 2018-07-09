<?php

namespace App\Http\Middleware;

use Closure;

class Banned {

    public function handle($request, Closure $next)
    {

        if ( \Auth::check() && \Auth::user()->isBanned() )
        {
            return redirect('/ban');
        }

        return $next($request);

    }

}
