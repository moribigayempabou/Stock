<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Affectation;
use App\Models\Materiel;
use App\Models\Notification;
use App\Models\Role;
use App\Models\Stock;
use App\Models\Structure;
use App\Models\User;
use App\Notifications\CustomNotification;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function index(Request $request)
    {

        // Récupérez les valeurs des paramètres d'URL date_debut et date_fin
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');

        // Si les deux dates sont définies, utilisez-les pour filtrer les matériels acquis
        if ($dateDebut && $dateFin) {
            // Vous pouvez maintenant utiliser $dateDebut et $dateFin pour filtrer les matériels acquis
            $materiels = Materiel::all();
            $structures = Structure::all();
            $affectations = Affectation::whereBetween('created_at', [$dateDebut, $dateFin])->paginate(5);
        } else {
            // Si les dates ne sont pas définies, affichez tous les matériels acquis
            $structures = Structure::all();
            $materiels = Materiel::paginate(10);
            $affectations = Affectation::paginate(10);

        }
        // Passer les données à la vue
        return view('Affectations.index', compact('affectations', 'structures', 'materiels'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function csafindex()
    {
        // Récupérer les acquisitions
        $affectations = Affectation::all();
        $structures = Structure::all();
        $materiels = Materiel::paginate(8);
        // Passer les données à la vue
        return view('CSAF/Affectations.index', compact('affectations', 'structures', 'materiels'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function csafshow($id)
    {
        $affectations = Affectation::findOrFail($id);
        return view('notifications.show', compact('affectations'));
    }
    public function show($id)
    {
        $affectations = Affectation::findOrFail($id);
        return view('notifications.show', compact('affectations'));
    }
    public function dafindex()
    {
        // Récupérer les acquisitions
        $affectations = Affectation::all();
        $structures = Structure::all();
        $materiels = Materiel::paginate(8);
        // Passer les données à la vue
        return view('DAF/Affectations.index', compact('affectations', 'structures', 'materiels'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit(Affectation $affectation)
    {
        $structures = Structure::all();
        $materiels = Materiel::all();
        // return response()->json($materiel);
        return view('Affectations.edit', compact('affectation', 'materiels', 'structures'));
    }


    public function dafedit(Affectation $affectation)
    {
        $structures = Structure::all();
        $materiels = Materiel::all();
        // return response()->json($materiel);
        return view('DAF/Affectations.edit', compact('affectation', 'materiels', 'structures'));
    }

    public function csafedit(Affectation $affectation)
    {
        $structures = Structure::all();
        $materiels = Materiel::all();
        // return response()->json($materiel);
        return view('CSAF/Affectations.edit', compact('affectation', 'materiels', 'structures'));
    }
    public function edite(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();
        return view('Affectations.NonAffectes', compact('materiel', 'structures', 'acquisitions'));
    }

    public function csafedite(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();
        return view('CSAF/Affectations.NonAffectes', compact('materiel', 'structures', 'acquisitions'));
    }

    public function dafedite(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();
        return view('DAF/Affectations.NonAffectes', compact('materiel', 'structures', 'acquisitions'));
    }
    public function affectes()
    {
        $structures = Structure::all();
        $materiels = Materiel::all();
        $affectations = Affectation::paginate(8);
        return view('Affectations.affectes', compact('affectations', 'materiels', 'structures'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function dafaffectes()
    {
        $structures = Structure::all();
        $materiels = Materiel::all();
        $affectations = Affectation::paginate(8);
        return view('DAF/Affectations.affectes', compact('affectations', 'materiels', 'structures'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function csafaffectes()
    {
        $structures = Structure::all();
        $materiels = Materiel::all();
        $affectations = Affectation::paginate(8);
        return view('CSAF/Affectations.affectes', compact('affectations', 'materiels', 'structures'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Materiel::where('nom', 'like', "%$query%")
            ->orWhere('reference', 'like', "%$query%")
            ->get();
        return response()->json($results);
    }

    public function affecter(Request $request, $id)
    {
        // Récupérez le matériel en fonction de l'ID
        $materiel = Materiel::findOrFail($id);

        // Mettez à jour la quantité affectée
        $quantiteAffectee = $request->input('quantiteAffectee');
        
        // Assurez-vous que la quantité affectée est valide et inférieure à la quantité disponible
        if ($quantiteAffectee >= 0 && $quantiteAffectee <= $materiel->quantite) {
            // Mettez à jour la quantité du matériel
            $materiel->quantite -= $quantiteAffectee;
            $materiel->save();

            // Vous pouvez également effectuer d'autres actions, comme enregistrer l'affectation dans la base de données

            return response()->json(['message' => 'Affectation réussie']);
        } else {
            return response()->json(['message' => 'Quantité invalide ou non disponible'], 400);
        }
    }



    /* public function update(Request $request, $id)
     {
         $affectation = Affectation::find($id);

         if (!$affectation) {
             return back()->with('error', 'Affectation non trouvée.');
         }

         $this->validate($request, [
             'materiels_id' => 'required',
             'quantite_affecte' => 'required|numeric|min:1',
             'structures_id' => 'required'
             // Ajoutez d'autres règles de validation pour d'autres champs si nécessaire
         ]);

         // Mettez à jour les champs de l'affectation avec les nouvelles valeurs
         $affectation->materiels_id = $request->input('materiels_id');
         $affectation->quantite_affecte = $request->input('quantite_affecte');
         $affectation->structures_id = $request->input('structures_id');

         // Si vous avez d'autres champs à mettre à jour, faites de même

         $affectation->save();

         // Redirigez vers la liste des affectations avec un message de succès
         return redirect('affectations')->with('success', 'L\'affectation a été mise à jour avec succès.');
     }
     */


    public function dafupdate(Request $request, $id)
    {
        $affectation = Affectation::find($id);

        if (!$affectation) {
            return back()->with('error', 'Affectation non trouvée.');
        }

        $this->validate($request, [
            'materiels_id' => 'required',
            'quantite_affecte' => 'required|numeric|min:1',
            'description' => 'required',
            'structures_id' => 'required'
            // Ajoutez d'autres règles de validation pour d'autres champs si nécessaire
        ]);

        // Mettez à jour les champs de l'affectation avec les nouvelles valeurs
        $affectation->materiels_id = $request->input('materiels_id');
        $affectation->quantite_affecte = $request->input('quantite_affecte');
        $affectation->description = $request->input('description');
        $affectation->structures_id = $request->input('structures_id');

        // Si vous avez d'autres champs à mettre à jour, faites de même

        // Récupérez l'ancienne quantité affectée pour la mise à jour de la quantité restante
        $ancienneQuantiteAffecte = $affectation->getOriginal('quantite_affecte');

        // Mettez à jour la quantité restante du matériel
        $materiel = Materiel::find($affectation->materiels_id);
        if ($materiel) {
            // Calculez la nouvelle quantité restante
            $nouvelleQuantiteRestante = $materiel->quantite_reste + $ancienneQuantiteAffecte - $request->input('quantite_affecte');

            // Assurez-vous que la nouvelle quantité restante ne soit pas négative
            $materiel->quantite_reste = max(0, $nouvelleQuantiteRestante);
            $materiel->save();
        }

        $affectation->save();

        // Redirigez vers la liste des affectations avec un message de succès
        return redirect('DAF/affectations')->with('success', 'L\'affectation a été mise à jour avec succès.');
    }


    public function csafupdate(Request $request, $id)
    {
        $affectation = Affectation::find($id);

        if (!$affectation) {
            return back()->with('error', 'Affectation non trouvée.');
        }

        $this->validate($request, [
            'materiels_id' => 'required',
            'quantite_affecte' => 'required|numeric|min:1',
            'description' => 'required',
            'structures_id' => 'required'
            // Ajoutez d'autres règles de validation pour d'autres champs si nécessaire
        ]);

        // Mettez à jour les champs de l'affectation avec les nouvelles valeurs
        $affectation->materiels_id = $request->input('materiels_id');
        $affectation->quantite_affecte = $request->input('quantite_affecte');
        $affectation->description = $request->input('description');
        $affectation->structures_id = $request->input('structures_id');

        // Si vous avez d'autres champs à mettre à jour, faites de même

        // Récupérez l'ancienne quantité affectée pour la mise à jour de la quantité restante
        $ancienneQuantiteAffecte = $affectation->getOriginal('quantite_affecte');

        // Mettez à jour la quantité restante du matériel
        $materiel = Materiel::find($affectation->materiels_id);
        if ($materiel) {
            // Calculez la nouvelle quantité restante
            $nouvelleQuantiteRestante = $materiel->quantite_reste + $ancienneQuantiteAffecte - $request->input('quantite_affecte');

            // Assurez-vous que la nouvelle quantité restante ne soit pas négative
            $materiel->quantite_reste = max(0, $nouvelleQuantiteRestante);
            $materiel->save();
        }

        $affectation->save();

        // Redirigez vers la liste des affectations avec un message de succès
        return redirect('CSAF/affectations')->with('success', 'L\'affectation a été mise à jour avec succès.');
    }

    public function update(Request $request, $id)
    {
        $affectation = Affectation::find($id);

        if (!$affectation) {
            return back()->with('error', 'Affectation non trouvée.');
        }

        $this->validate($request, [
            'materiels_id' => 'required',
            'quantite_affecte' => 'required|numeric|min:1',
            'description' => 'required',
            'structures_id' => 'required'
            // Ajoutez d'autres règles de validation pour d'autres champs si nécessaire
        ]);

        // Mettez à jour les champs de l'affectation avec les nouvelles valeurs
        $affectation->materiels_id = $request->input('materiels_id');
        $affectation->quantite_affecte = $request->input('quantite_affecte');
        $affectation->description = $request->input('description');
        $affectation->structures_id = $request->input('structures_id');

        // Si vous avez d'autres champs à mettre à jour, faites de même

        // Récupérez l'ancienne quantité affectée pour la mise à jour de la quantité restante
        $ancienneQuantiteAffecte = $affectation->getOriginal('quantite_affecte');

        // Mettez à jour la quantité restante du matériel
        $materiel = Materiel::find($affectation->materiels_id);
        if ($materiel) {
            // Calculez la nouvelle quantité restante
            $nouvelleQuantiteRestante = $materiel->quantite_reste + $ancienneQuantiteAffecte - $request->input('quantite_affecte');

            // Assurez-vous que la nouvelle quantité restante ne soit pas négative
            $materiel->quantite_reste = max(0, $nouvelleQuantiteRestante);
            $materiel->save();
        }

        $affectation->save();
        $quantiteAffecte = $affectation->quantite_affecte;
        $stockActuel = Stock::sum('quantite');
        $nouvelleQuantiteStock = $stockActuel - $quantiteAffecte;

        // Mise à jour de la quantité du stock (assurez-vous d'importer le modèle Stock)
        $stock = Stock::first();
        $stock->quantite = $nouvelleQuantiteStock;
        $stock->save();

        // Redirigez vers la liste des affectations avec un message de succès
        return redirect('affectations')->with('success', 'L\'affectation a été mise à jour avec succès.');
    }

    public function dafstore(Request $request)
    {
        // Récupérez le matériel par référence
        $materiel = Materiel::where('reference', $request->input('reference'))->first();

        if (!$materiel) {
            return back()->with('error', 'Référence de matériel non trouvée.');
        }

        // Récupérez la quantité affectée depuis la requête
        $quantiteAffecte = $request->input('quantite_affecte');
        $description = $request->input('description');
        // Vérifiez si la quantité restante est suffisante
        if ($materiel->quantite_reste < $quantiteAffecte) {
            return redirect()->back()->with('error', 'La quantité restante est insuffisante.');
        }

        // Créez une nouvelle affectation
        $affectation = new Affectation();
        $affectation->materiels_id = $materiel->id;
        $affectation->quantite_affecte = $quantiteAffecte;
        $affectation->description = $description;// Utilisez le nom de la colonne correct
        $affectation->structures_id = $request->input('structures_id');
        $affectation->save();

        if ($affectation->save()) {
            // Créez une notification
            $notification = new Notification();
            $notification->structures_id = $affectation->structures_id; // ID de la structure sélectionnée
            $notification->message = 'Vous avez reçu une nouvelle affectation .';
            $notification->link = 'Cliquez pour en savoir plus';
            $notification->save();
        }

        // Mettez à jour la quantité restante du matériel
        $materiel->quantite_reste -= $quantiteAffecte;
        $materiel->save();

        // Calcul de la nouvelle quantité du stock après l'affectation (assurez-vous d'importer le modèle Stock)
        $quantiteAffecte = $affectation->quantite_affecte;
        $stockActuel = Stock::sum('quantite');
        $nouvelleQuantiteStock = $stockActuel - $quantiteAffecte;

        // Mise à jour de la quantité du stock (assurez-vous d'importer le modèle Stock)
        $stock = Stock::first();
        $stock->quantite = $nouvelleQuantiteStock;
        $stock->save();

        // Recherchez le rôle "CSAF" dans la table des rôles
        $Role = Role::where('type_utilisateur', 'CSAF')->first();

        if ($Role) {
            // Recherchez l'utilisateur auquel vous souhaitez attribuer le rôle
            $user = User::where('roles_id')->first();

            if ($user) {
                // Attachez le rôle "CSAF" à l'utilisateur
                $user->roles()->sync([$Role->id]);

                // Envoyez la notification par e-mail
                $user->notify(new CustomNotification($affectation));
            }
        }
        // Rediriger vers la liste des affectations avec un message de succès
        return redirect('DAF/affectations')->with('success', 'L\'affectation a été enregistrée avec succès.');
    }


    public function store(Request $request)
    {
        // Récupérez le matériel par référence
        $materiel = Materiel::where('reference', $request->input('reference'))->first();

        if (!$materiel) {
            return back()->with('error', 'Référence de matériel non trouvée.');
        }

        // Récupérez la quantité affectée depuis la requête
        $quantiteAffecte = $request->input('quantite_affecte');
        $description = $request->input('description');
        // Vérifiez si la quantité restante est suffisante
        if ($materiel->quantite_reste < $quantiteAffecte) {
            return redirect()->back()->with('error', 'La quantité restante est insuffisante.');
        }

        // Créez une nouvelle affectation
        $affectation = new Affectation();
        $affectation->materiels_id = $materiel->id;
        $affectation->quantite_affecte = $quantiteAffecte;
        $affectation->description = $description;// Utilisez le nom de la colonne correct
        $affectation->structures_id = $request->input('structures_id');
        $affectation->save();

        // Mise à jour de la quantité restante du matériel
        $materiel->quantite_reste -= $quantiteAffecte;
        $materiel->save();

        // Calcul de la nouvelle quantité du stock après l'affectation (assurez-vous d'importer le modèle Stock)
        $quantiteAffecte = $affectation->quantite_affecte;
        $stockActuel = Stock::sum('quantite');
        $nouvelleQuantiteStock = $stockActuel - $quantiteAffecte;

        // Mise à jour de la quantité du stock (assurez-vous d'importer le modèle Stock)
        $stock = Stock::first();
        $stock->quantite = $nouvelleQuantiteStock;
        $stock->save();

        // Recherchez le rôle "CSAF" dans la table des rôles
        $Role = Role::where('type_utilisateur', 'CSAF')->first();

        if ($Role) {
            // Recherchez l'utilisateur auquel vous souhaitez attribuer le rôle
            $user = User::where('roles_id', $Role->id)->first();

            if ($user) {
                // Attachez le rôle "CSAF" à l utilisateur
                //$user->roles()->sync([$Role->id]);
                $user->update(['roles_id' => $Role->id]);

                // Envoyez la notification par e-mail
                $user->notify(new CustomNotification($affectation));
            }
        }

        // Rediriger vers la liste des affectations avec un message de succès
        return redirect('affectations')->with('success', 'L\'affectation a été enregistrée avec succès.');
    }





    public function delete($affectations)
    {
        Affectation::find($affectations)->delete();

        return back()->with('successDelete', 'Affectation supprimé avec succès.');
    }


    public function getMaterielAffecte($id)
    {
        $affectation = Affectation::find($id);

        if (!$affectation) {
            return response()->json(['message' => 'Affectation non trouvée.'], 404);
        }

        $materiel = $affectation->materiel;
        $structure = $affectation->structure;

        $result = [
            'materiel' => $materiel,
            'quantite_retournee' => $affectation->quantite_affecte,
            'structure' => $structure,
        ];

        return response()->json($result);
    }

}
