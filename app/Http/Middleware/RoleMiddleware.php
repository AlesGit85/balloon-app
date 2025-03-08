<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Musíte se přihlásit.');
        }

        if (Auth::user()->role !== $role) {
            return match (Auth::user()->role) {
                'admin' => redirect('/overview')->with('error', 'Nemáte oprávnění k této stránce.'),
                'pilot' => redirect('/flight_dashboard')->with('error', 'Nemáte oprávnění k této stránce.'),
                default => redirect('/')->with('error', 'Nemáte oprávnění.'),
            };
        }

        return $next($request);
    }
}
