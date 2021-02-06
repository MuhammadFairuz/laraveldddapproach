<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MultiLanguage
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
        $lang = $request->lang ?? 'id';
        app()->setLocale($lang);

        return $next($request);
    }
}
