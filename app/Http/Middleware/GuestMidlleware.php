<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestMidlleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ?string $guard = null): Response
    {
        // Cek apakah admin sudah login
        if ($request->session()->has('admin_authenticated')) {
            return redirect('admin-dashboard'); 
        }

        return $next($request);
    }
}