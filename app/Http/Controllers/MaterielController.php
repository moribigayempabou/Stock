<?php

namespace App\Http\Controllers;
use App\Rules\CustomAlphabetRule;
use App\Events\MaterielCreated;
use App\Models\Acquisition;
use App\Models\Affectation;
use App\Models\Materiel;
use App\Models\Stock;
use App\Models\Structure;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index(Request $request)
{
    // Récupérez les valeurs des paramètres d'URL date_debut et date_fin
    $dateDebut = $request->input('date_debut');
    $dateFin = $request->input('date_fin');

    // Si les deux dates sont définies, utilisez-les pour filtrer les matériels acquis
    if ($dateDebut && $dateFin) {
        // Vous pouvez maintenant utiliser $dateDebut et $dateFin pour filtrer les matériels acquis
        $acquisitions = Acquisition::all();
        $materiels = Materiel::whereBetween('created_at', [$dateDebut, $dateFin])->paginate(10);
    } else {
        // Si les dates ne sont pas définies, affichez tous les matériels acquis
        $acquisitions = Acquisition::all();
        $materiels = Materiel::paginate(10);
    }

     // Passez les matériels filtrés à la vue
    return view('Materiels.index', compact('acquisitions', 'materiels'))->with('i', (request()->input('page', 1) - 1) * 5);

}

public function dafindex(Request $request)
{
    // Récupérez les valeurs des paramètres d'URL date_debut et date_fin
    $dateDebut = $request->input('date_debut');
    $dateFin = $request->input('date_fin');

    // Si les deux dates sont définies, utilisez-les pour filtrer les matériels acquis
    if ($dateDebut && $dateFin) {
        // Vous pouvez maintenant utiliser $dateDebut et $dateFin pour filtrer les matériels acquis
        $acquisitions = Acquisition::all();
        $materiels = Materiel::whereBetween('created_at', [$dateDebut, $dateFin])->paginate(10);
    } else {
        // Si les dates ne sont pas définies, affichez tous les matériels acquis
        $acquisitions = Acquisition::all();
        $materiels = Materiel::paginate(10);
    }

     // Passez les matériels filtrés à la vue
    return view('DAF/Materiels.index', compact('acquisitions', 'materiels'))->with('i', (request()->input('page', 1) - 1) * 5);

}

public function csafindex(Request $request)
{
    // Récupérez les valeurs des paramètres d'URL date_debut et date_fin
    $dateDebut = $request->input('date_debut');
    $dateFin = $request->input('date_fin');

    // Si les deux dates sont définies, utilisez-les pour filtrer les matériels acquis
    if ($dateDebut && $dateFin) {
        // Vous pouvez maintenant utiliser $dateDebut et $dateFin pour filtrer les matériels acquis
        $acquisitions = Acquisition::all();
        $materiels = Materiel::whereBetween('created_at', [$dateDebut, $dateFin])->paginate(10);
    } else {
        // Si les dates ne sont pas définies, affichez tous les matériels acquis
        $acquisitions = Acquisition::all();
        $materiels = Materiel::paginate(10);
    }

     // Passez les matériels filtrés à la vue
    return view('CSAF/Materiels.index', compact('acquisitions', 'materiels'))->with('i', (request()->input('page', 1) - 1) * 5);

}

    public function edit(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();

        return view('Materiels.edit', compact('materiel','structures','acquisitions'));
    }
    public function edite(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();
        return view('Affectations.NonAffectes', compact('materiel','structures','acquisitions'));
    }


    public function dafedit(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();

        return view('DAF/Materiels.edit', compact('materiel','structures','acquisitions'));
    }

    public function csafedit(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();

        return view('CSAF/Materiels.edit', compact('materiel','structures','acquisitions'));
    }
    public function csafedite(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();
        return view('CSAF/Affectations.NonAffectes', compact('materiel','structures','acquisitions'));
    }
    public function dafedite(Materiel $materiel)
    {
        $structures = Structure::all();
        $acquisitions = Acquisition::all();
        return view('DAF/Affectations.NonAffectes', compact('materiel','structures','acquisitions'));
    }

    public function update(Request $request, Materiel $materiel)
    {

    // Valider les données du formulaire
    $validatedData = $request->validate([
        'reference' => 'required',
        'nom' => 'required',
        'type_materiel' => 'required',
        'description' => 'nullable',
        'quantite' => 'required',
        'etat' => 'required',
    ]);

    // Obtenir la quantité actuelle du matériel
    $ancienneQuantite = $materiel->quantite;

    // Mettre à jour les attributs du matériel
    $materiel->update($validatedData);

    // Obtenir la nouvelle quantité du matériel
    $nouvelleQuantite = $materiel->quantite;

    // Calculer la différence entre l'ancienne et la nouvelle quantité
    $differenceQuantite = $nouvelleQuantite - $ancienneQuantite;

    // Mettre à jour le stock
    $stock = Stock::first();
    $stock->quantite += $differenceQuantite;
    $stock->save();

    // Récupérer l'ID de l'acquisition associée au matériel
    $acquisitionId = $materiel->acquisitions->id;

        // Rediriger vers la page de l'acquisition avec un message de succès
        return redirect()->route('acquisitions.show', ['id' => $acquisitionId])->with('success', 'Le matériel a été mis à jour avec succès.');
    }

    public function dafupdate(Request $request, Materiel $materiel)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'reference' => 'required',
            'nom' => 'required',
            'type_materiel' => 'required',
            'description' => 'nullable',
            'quantite' => 'required',
            'etat' => 'required',
        ]);

        // Mettre à jour les attributs du matériel
        $materiel->update($validatedData);

        // Mettre à jour le stock
        $quantiteMateriel = $materiel->quantite;
        $stockActuel = Stock::sum('quantite');
        $stockActuel -= $quantiteMateriel;
        $stock = Stock::first();
        $stock->quantite = $stockActuel;
        $stock->save();

        // Récupérer l'ID de l'acquisition associée au matériel
        $acquisitionId = $materiel->acquisitions->id;

        // Rediriger vers la page de l'acquisition avec un message de succès
        return redirect()->route('DAF/acquisitions.show', ['id' => $acquisitionId])->with('success', 'Le matériel a été mis à jour avec succès.');
    }



    public function dafstore(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'reference' => 'required',
            'nom' => 'required',
            'type_materiel' => 'required',
            'description' => 'nullable',
            'quantite' => 'required',
            'etat' => 'required',
        ]);

        // Créer une nouvelle instance de modèle Materiel
        $materiel = new Materiel();
        $materiel->reference = $validatedData['reference'];
        $materiel->nom = $validatedData['nom'];
        $materiel->type_materiel = $validatedData['type_materiel'];
        $materiel->description = $validatedData['description'];
        $materiel->quantite = $validatedData['quantite'];
        $materiel->etat = $validatedData['etat'];

        // Récupérer l'ID d'acquisition à partir de la session
        $acquisitionId = session('current_acquisition_id');

        // Assigner l'ID d'acquisition au matériel
        $materiel->acquisitions_id = $acquisitionId;

        // Enregistrer le nouveau matériel dans la base de données
        $materiel->save();

     // Émettez l'événement MaterielCreated
     event(new MaterielCreated($materiel));


         // Mettre à jour le stock
     $stockActuel = Stock::sum('quantite');
     $stockActuel += $request->quantite;

     $stock = Stock::first();
     $stock->quantite = $stockActuel;
     $stock->save(); // Enregistrez les modifications
        // Redirection vers la vue de détails de l'acquisition
        return redirect()->route('DAF/acquisitions.show', ['id' => $acquisitionId])
            ->with('success', 'Matériel ajouté avec succès.');
    }

public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'reference' => ['required', new CustomAlphabetRule],
        'nom' => ['required', new CustomAlphabetRule],
        'type_materiel' => 'required',
        'description' => 'nullable',
        'quantite' => 'required',
        'etat' => 'required',
    ]);

    // Créer une nouvelle instance de modèle Materiel
    $materiel = new Materiel();
    $materiel->reference = $validatedData['reference'];
    $materiel->nom = $validatedData['nom'];
    $materiel->type_materiel = $validatedData['type_materiel'];
    $materiel->description = $validatedData['description'];
    $materiel->quantite = $validatedData['quantite'];
    $materiel->etat = $validatedData['etat'];

    // Récupérer l'ID d'acquisition à partir de la session
    $acquisitionId = session('current_acquisition_id');

    // Assigner l'ID d'acquisition au matériel
    $materiel->acquisitions_id = $acquisitionId;

    // Enregistrer le nouveau matériel dans la base de données
    $materiel->save();

 // Émettez l'événement MaterielCreated
 event(new MaterielCreated($materiel));


     // Mettre à jour le stock
 $stockActuel = Stock::sum('quantite');
 $stockActuel += $request->quantite;

 $stock = Stock::first();
 $stock->quantite = $stockActuel;
 $stock->save(); // Enregistrez les modifications
    // Redirection vers la vue de détails de l'acquisition
    return redirect()->route('acquisitions.show', ['id' => $acquisitionId])
        ->with('success', 'Matériel ajouté avec succès.');
}




    //return redirect('materiels')->with('success', 'Le materiel a été ajouté avec succès');


    public function show($id)
    {
        $materiels = Materiel::findOrFail($id);
        return view('Materiels.show', compact('materiels'));
    }

    public function dafshow($id)
    {
        $materiels = Materiel::findOrFail($id);
        return view('DAF/Materiels.show', compact('materiels'));
    }





    /*public function delete($materiels)
    {
        $materiel = Materiel::find($materiels);

        if (!$materiel) {
            return back()->with('error', 'Matériel non trouvé.');
        }

        $quantiteSupprimee = $materiel->quantite;

        $materiel->delete();

        $stock = Stock::first(); // Récupérez l'instance du premier enregistrement de Stock
        $stockActuel = $stock->quantite;

        // Soustrayez la quantité du matériel supprimé à la quantité actuelle du stock
        $stockActuel -= $quantiteSupprimee;

        $stock->quantite = $stockActuel; // Mettez à jour la quantité
        $stock->save(); // Enregistrez les modifications

        return back()->with('successDelete', 'Matériel supprimé avec succès.');
    }*/
    public function delete($materiels)
{
    $materiel = Materiel::find($materiels);

    if (!$materiel) {
        return back()->with('error', 'Matériel non trouvé.');
    }

    $quantiteSupprimee = $materiel->quantite;

    // Supprimez le matériel
    $materiel->delete();

    // Récupérez l'instance du premier enregistrement de Stock
    $stock = Stock::first();

    // Soustrayez la quantité du matériel supprimé à la quantité actuelle du stock
    $stock->quantite -= $quantiteSupprimee;

    // Enregistrez les modifications du stock
    $stock->save();

    return back()->with('successDelete', 'Matériel supprimé avec succès.');
}


    public function dafdelete($materiels)
    {
        $materiel = Materiel::find($materiels);

        if (!$materiel) {
            return back()->with('error', 'Matériel non trouvé.');
        }

        $quantiteSupprimee = $materiel->quantite;

        $materiel->delete();

        $stock = Stock::first(); // Récupérez l'instance du premier enregistrement de Stock
        $stockActuel = $stock->quantite;

        // Soustrayez la quantité du matériel supprimé à la quantité actuelle du stock
        $stockActuel -= $quantiteSupprimee;

        $stock->quantite = $stockActuel; // Mettez à jour la quantité
        $stock->save(); // Enregistrez les modifications

        return back()->with('successDelete', 'Matériel supprimé avec succès.');
    }

    public function affecter(Request $request, Materiel $materiel)
{
    $this->validate($request, [
        'quantite_affecte' => 'required|integer|min:1|max:' . $materiel->quantite
    ]);

    // Créer une nouvelle affectation
    $affectation = new Affectation([
        'quantite_affectee' => $request->input('quantite_affecte')
        // Ajoutez d'autres champs d'affectation si nécessaire
    ]);
    $affectation->save();

    // Mettre à jour la quantité du matériel
    $nouvelleQuantite = $materiel->quantite - $request->input('quantite_affecte');
    $materiel->quantite = $nouvelleQuantite;
    $materiel->save();

    return redirect()->route('materiels')->with('success', 'Matériel affecté avec succès.');
}

public function dafaffecter(Request $request, Materiel $materiel)
{
    $this->validate($request, [
        'quantite_affecte' => 'required|integer|min:1|max:' . $materiel->quantite
    ]);

    // Créer une nouvelle affectation
    $affectation = new Affectation([
        'quantite_affectee' => $request->input('quantite_affecte')
        // Ajoutez d'autres champs d'affectation si nécessaire
    ]);
    $affectation->save();

    // Mettre à jour la quantité du matériel
    $nouvelleQuantite = $materiel->quantite - $request->input('quantite_affecte');
    $materiel->quantite = $nouvelleQuantite;
    $materiel->save();

    return redirect()->route('DAF/materiels')->with('success', 'Matériel affecté avec succès.');
}

}
