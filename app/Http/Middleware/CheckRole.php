<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Vérifiez si l'utilisateur est authentifié et s'il a au moins l'un des rôles autorisés
        if ($user && $user->roles()->whereIn('type_utilisateur', $roles)->exists()) {
            return $next($request);
        }

        abort(403, '.');

        // Vous pouvez personnaliser le message d'erreur ou la redirection ici
    }
}

