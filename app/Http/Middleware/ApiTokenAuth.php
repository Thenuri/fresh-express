<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    // public function handle($request, Closure $next)
    // {
    //     $apiToken = $request->header('Authorization');

    //     if (!$apiToken) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }

    //     $user = User::where('api_token', $apiToken)->first();

    //     if (!$user) {
    //         return response()->json(['message' => 'Invalid API token'], 401);
    //     }

    //     // Set the authenticated user
    //     auth()->setUser($user);

    //     return $next($request);
    // }
}
