<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Musíte se přihlásit.');
        }

        $userRole = Auth::user()->role;

        // Pokud je role uživatele mezi povolenými, pokračujeme
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Přesměrování podle role
        return match ($userRole) {
            'admin' => redirect('/overview')->with('error', 'Nemáte oprávnění k této stránce.'),
            'pilot' => redirect('/flight_dashboard')->with('error', 'Nemáte oprávnění k této stránce.'),
            default => redirect('/')->with('error', 'Nemáte oprávnění.'),
        };
    }
}
