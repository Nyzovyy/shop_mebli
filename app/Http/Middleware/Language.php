<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class Language {

    public function handle($request, Closure $next)
    {

        if(\Auth::guest()){
            if(Cookie::get('language') == 'ru' || Cookie::get('language') == 'ua'){
                \App::setLocale(Cookie::get('language'));
            }
        }else{
            \App::setLocale(\Auth::user()->language);
        }
        return $next($request);

    }

}
