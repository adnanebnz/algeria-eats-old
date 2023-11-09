<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserProfileOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $requestedUserId = $request->route('user')->id;

        if (Auth::id() != $requestedUserId) {
            return redirect()->route('index')->with('error', 'Unauthorized access');
            // TODO CREATE ALERT LATER
        }

        return $next($request);
    }
}
