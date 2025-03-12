<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminToken = env('ADMIN_TOKEN');

        if ($request->session()->get('admin_authenticated') !== true) {
            return redirect('login-admin')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}