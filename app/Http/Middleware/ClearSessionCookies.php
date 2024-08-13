<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearSessionCookies
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Call the next middleware and get the response
    $response = $next($request);

    // List of cookies to clear
    $cookies = ['laravel_session', 'XSRF-TOKEN'];

    // Loop through each cookie and clear it
    foreach ($cookies as $cookie) {
        $response->headers->clearCookie($cookie);
    }

    // Return the modified response
    return $response;
}

}
