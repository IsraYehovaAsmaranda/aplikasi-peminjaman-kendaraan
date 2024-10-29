<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (Auth::check()) {
                return $next($request);
            }
            return redirect()->route('loginPage')->withErrors("Silahkan login terlebih dahulu!");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Terjadi kesalahan dalam proses pengecekan login.");
        }
    }
}
