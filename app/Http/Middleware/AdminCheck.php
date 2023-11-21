<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'admin') {
            // User has the 'admin' role, proceed with the request
            return $next($request);
        }
//        return abort(403, 'Unauthorized action.');
        return abort(404);
//        return redirect('/');
    }
}
