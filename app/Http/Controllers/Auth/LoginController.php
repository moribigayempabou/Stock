<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        // Validation des données du formulaire de connexion
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative d'authentification
        $credentials = $request->only('email', 'password');

       // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {        // Authentification réussie, récupérez l'utilisateur
        if (Auth::attempt($credentials)) {
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
                            return redirect('DAF/Acquisitions');
                        case 'CSAF':
                            // Redirection pour les utilisateurs avec le rôle "CSAF"
                            return redirect('CSAF/Affectations');
                       // default:
                            // Redirection par défaut si le rôle n'est pas reconnu.
                           // return redirect('/');
                    }
                }
            }

            return redirect('/');

        }
         // Si l'authentification échoue, redirigez l'utilisateur vers la page de connexion avec un message d'erreur
         return redirect()->route('login')->with('error', 'Email et/ou mot de passe incorrect');
    }

}


