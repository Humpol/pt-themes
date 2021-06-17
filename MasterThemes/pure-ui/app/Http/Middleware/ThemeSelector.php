<?php

namespace Pterodactyl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Igaster\LaravelTheme\Facades\Theme;

class ThemeSelector
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
     if(!empty($request->user()->theme)){
        if(Theme::exists($request->user()->theme)){
           Theme::set($request->user()->theme);
         }
       }
        return $next($request);
    }
}
