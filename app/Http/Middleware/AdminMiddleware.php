<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'admin' role
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Redirect to admin login if the user is not authenticated or does not have the 'admin' role
        return redirect()->route('admin.login');
    }
}
