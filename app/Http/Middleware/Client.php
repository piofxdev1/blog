<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $theme = 'front';
        session(['theme' => $theme]);
        session(['layout' => 'themes.'.$theme.'.layouts.app']);
        return $next($request);
    }
}
