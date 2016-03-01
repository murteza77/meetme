<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Locale
{

    protected $lang;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     //   $response = 

            $this->user = auth()->user();

            if(auth()->check() and !empty(auth()->user()->lang))            
                $this->lang = auth()->user()->lang;                

            elseif($request->hasCookie('lang'))
                $this->lang = $request->cookie('lang');

            else
                $this->lang = config('app.locale');  

            
             app()->setLocale($this->lang);   
                     

        if(!$request->hasCookie('lang') || $request->cookie('lang') != $this->lang)     
            return $next($request)->withCookie(cookie()->forever('lang', $this->lang));

        else 
            return $next($request);
    }
}