<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('locale')) {
            App::setLocale($request->session()->get('locale'));
        }

        return $next($request);
    }
}
