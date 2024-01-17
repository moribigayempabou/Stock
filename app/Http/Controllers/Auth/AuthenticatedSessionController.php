<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   /**
 * Handle an incoming authentication request.
 */
public function store(LoginRequest $request): RedirectResponse
{
    // Validation des données du formulaire de connexion
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tentative d'authentification
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Authentification réussie, récupérez l'utilisateur

        // Récupérez l'utilisateur actuellement authentifié
        $user = auth()->user();

        if ($user) {
            // Utilisez la relation "roles" pour obtenir le rôle de l'utilisateur
            $role = $user->roles;

            if ($role) {
                // Maintenant, vous pouvez accéder au nom du rôle de l'utilisateur
                $roleName = $role->type_utilisateur;

                // Faites quelque chose avec le nom du rôle, par exemple, l'utiliser pour la redirection
                switch ($roleName) {
                    case 'Admin':
                        // Redirection pour les utilisateurs avec le rôle "Admin"
                        return redirect('/home');
                    case 'DAF':
                        // Redirection pour les utilisateurs avec le rôle "DAF"
                        return redirect('/DAF/acceuil');
                    case 'CSAF':
                        // Redirection pour les utilisateurs avec le rôle "CSAF"
                        return redirect('/CSAF/acceuil');
                    default:
                        // Redirection par défaut si le rôle n'est pas reconnu.
                        return redirect('/');
                }
            }
        }
    }

    // Si l'authentification échoue ou si aucun cas de redirection n'est atteint, redirigez l'utilisateur vers la page de connexion avec un message d'erreur
    return redirect()->route('login')->with('error', 'Email et/ou mot de passe incorrect');
}





    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
