<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotApproved
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
        if (Auth::check()) {
            // Check if the user is active
            if (Auth::user()->status == 0) {
                // Logout the user
                Auth::logout();

                // Redirect to login
                return redirect()->route('login')->with('errormessage', 'Your account is not active. Please contact the administrator.');
            }
        }

        return $next($request);
    }
}
