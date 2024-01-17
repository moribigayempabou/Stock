<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UtilisateurController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $structures = Structure::all();
        $usertypes = Role::all();
        $users = User::paginate(5);
        $roles = Role::all();
        return view("Utilisateurs.index", compact("users", "structures", "usertypes", "roles"))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function dafindex()
    {

        $structures = Structure::all();
        $usertypes = Role::all();
        $users = User::paginate(8);
        $roles = Role::all();
        return view("DAF.index", compact("users", "structures", "usertypes", "roles"))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminindex()
    {

        $structures = Structure::all();
        $usertypes = Role::all();
        $users = User::paginate(8);
        $roles = Role::all();
        return view("Admin/Utilisateurs.index", compact("users", "structures", "usertypes", "roles"))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function edit(User $user)
    {
        $structures = Structure::all();
        $roles = Role::all();
        return view("Utilisateurs.edit", compact("user", "structures", "roles"));
    }

    public function adminedit(User $user)
    {
        $structures = Structure::all();
        $roles = Role::all();
        return view("Admin/Utilisateurs.edit", compact("user", "structures", "roles"));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'structures_id' => 'required',
            'roles_id' => 'required',
        ]);



        // Récupérer les données du formulaire
        $name = $request->input('name');
        $prenom = $request->input('prenom');
        $adresse = $request->input('adresse');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        // Hacher le mot de passe avant l'enregistrement
        $hashedPassword = Hash::make($request->input('password'));
        $nom = $request->input('structures_id');
        $type_utilisateur = $request->input('roles_id');

        // Créer une nouvelle instance du modèle Utilisateur
        $user = new User();
        $user->name = $name;
        $user->prenom = $prenom;
        $user->adresse = $adresse;
        $user->telephone = $telephone;
        $user->email = $email;
        $user->password = $hashedPassword; // Utiliser le mot de passe haché
        $user->structures_id = $nom;
        $user->roles_id = $type_utilisateur;

        // Enregistrer le nouvel utilisateur dans la base de données
        $user->save();

        // Rediriger vers la liste des utilisateurs
        return redirect()->route('utilisateurs')->with('success', 'Utilisateur ajouté avec succès');
    }


    public function adminstore(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'structures_id' => 'required',
            'roles_id' => 'required',
        ]);



        // Récupérer les données du formulaire
        $name = $request->input('name');
        $prenom = $request->input('prenom');
        $adresse = $request->input('adresse');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        // Hacher le mot de passe avant l'enregistrement
        $hashedPassword = Hash::make($request->input('password'));
        $nom = $request->input('structures_id');
        $type_utilisateur = $request->input('roles_id');

        // Créer une nouvelle instance du modèle Utilisateur
        $user = new User();
        $user->name = $name;
        $user->prenom = $prenom;
        $user->adresse = $adresse;
        $user->telephone = $telephone;
        $user->email = $email;
        $user->password = $hashedPassword; // Utiliser le mot de passe haché
        $user->structures_id = $nom;
        $user->roles_id = $type_utilisateur;

        // Enregistrer le nouvel utilisateur dans la base de données
        $user->save();

        // Rediriger vers la liste des utilisateurs
        return redirect()->route('Admin/utilisateurs')->with('success', 'Utilisateur ajouté avec succès');
    }

    public function dafstore(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'structures_id' => 'required',
            'roles_id' => 'required',
        ]);



        // Récupérer les données du formulaire
        $name = $request->input('name');
        $prenom = $request->input('prenom');
        $adresse = $request->input('adresse');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        // Hacher le mot de passe avant l'enregistrement
        $hashedPassword = Hash::make($request->input('password'));
        $nom = $request->input('structures_id');
        $type_utilisateur = $request->input('roles_id');

        // Créer une nouvelle instance du modèle Utilisateur
        $user = new User();
        $user->name = $name;
        $user->prenom = $prenom;
        $user->adresse = $adresse;
        $user->telephone = $telephone;
        $user->email = $email;
        $user->password = $hashedPassword; // Utiliser le mot de passe haché
        $user->structures_id = $nom;
        $user->roles_id = $type_utilisateur;

        // Enregistrer le nouvel utilisateur dans la base de données
        $user->save();

        // Rediriger vers la liste des utilisateurs
        return redirect()->route('Admin/utilisateurs')->with('success', 'Utilisateur ajouté avec succès');
    }
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->adresse = $request->input('adresse');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->structures_id = $request->input('structures_id');
        $user->roles_id = $request->input('roles_id');
        $user->save();
        return redirect()->route('utilisateurs')->with('success', 'Les infos  ont été mise à jour avec succès');
    }


    public function adminupdate(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->adresse = $request->input('adresse');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->structures_id = $request->input('structures_id');
        $user->roles_id = $request->input('roles_id');
        $user->save();
        return redirect()->route('Admin/utilisateurs')->with('success', 'Les infos  ont été mise à jour avec succès');
    }

    public function delete($users)
    {
        User::find($users)->delete();

        return back()->with('successDelete', 'utilisateur supprimé avec succès.');
    }


    public function admindelete($users)
    {
        User::find($users)->delete();

        return back()->with('successDelete', 'utilisateur supprimé avec succès.');
    }
}
