<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::all();
    $structures = Structure::all(); // Remplacez par la logique de récupération de vos structures
    return view('auth.register', compact('roles','structures'));

       // return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'adresse'=> ['required', 'string', 'max:255'],
            'telephone'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'structures_id' => ['required'],
            'roles_id'=> ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'structures_id' => $request->structures_id,
            'roles_id' => $request->roles_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        return redirect()->route('login')->with('votre compte a été créé avec succes');
    }

}
