<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use \App\User;
use Auth;
class LangController extends Controller
{
    public function index()
    {
       
    }
    public function change($locale)
    {
       /* if(Cookie::get('lang'))
            Cookie::forget('lang');*/

        if(!Auth::check()) {
            if ($locale == 'ua' || $locale == 'ru') {
                \App::setLocale($locale);
              //  Cookie::queue('lang', $locale, 518400);
                $cookie = cookie('language', $locale, 518400);

                return back()->cookie($cookie);
            }
        }else{
                if ($locale == 'ua' || $locale == 'ru'){
                    \App::setLocale($locale);
                    $user = User::find(\Auth::id());
                    $user->language = $locale;
                    $user->save();
                    return back();
                }
            }

    }
}
