<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRequired
{
    public function handle(Request $request, Closure $next)
    {
        // Change 'admin()' method to 'admin' property
        if (!Auth::check() || !Auth::user()->is_admin()) {
            return redirect()->route('orders.index');
        }

        return $next($request);
    }
}