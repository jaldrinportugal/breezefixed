<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $type
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if (Auth::check()) {
            // Check if the authenticated user's usertype matches the required type
            if (Auth::user()->usertype === $type) {
                return $next($request); // Allow the request to proceed
            }
        }

        // Redirect to home route if usertype does not match or user is not authenticated
        return redirect()->route('home'); // Add a flash message if needed
    }
}
