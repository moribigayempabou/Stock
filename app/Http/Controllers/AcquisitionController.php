<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Materiel;
use App\Models\TypeAcquisition;
use Illuminate\Http\Request;
class AcquisitionController extends Controller
{
    public function index()
    {
        $type_acquisitions = TypeAcquisition::all();
        $materiels = Materiel::all();
        $acquisitions = Acquisition::paginate(8);

        return view("Acquisitions.index", compact("materiels","acquisitions","type_acquisitions"))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function dafindex()
    {
        $type_acquisitions = TypeAcquisition::all();
        $materiels = Materiel::all();
        $acquisitions = Acquisition::paginate(8);

        return view("DAF/Acquisitions.index", compact("materiels","acquisitions","type_acquisitions"))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function csafindex()
    {
        $type_acquisitions = TypeAcquisition::all();
        $materiels = Materiel::all();
        $acquisitions = Acquisition::paginate(8);

        return view("CSAF/Acquisitions.index", compact("materiels","acquisitions","type_acquisitions"))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function adminindex()
    {
        $type_acquisitions = TypeAcquisition::all();
        $materiels = Materiel::all();
        $acquisitions = Acquisition::paginate(8);

        return view("Admin/Acquisitions.index", compact("materiels","acquisitions","type_acquisitions"))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $type_acquisitions = TypeAcquisition::all();
        return view("Acquisitions.create", compact("type_acquisitions"));
    }

    public function dafcreate()
    {
        $type_acquisitions = TypeAcquisition::all();
        return view("DAF/Acquisitions.create", compact("type_acquisitions"));
    }

    public function csafcreate()
    {
        $type_acquisitions = TypeAcquisition::all();
        return view("CSAF/Acquisitions.create", compact("type_acquisitions"));
    }

    public function admincreate()
    {
        $type_acquisitions = TypeAcquisition::all();
        return view("Admin/Acquisitions.create", compact("type_acquisitions"));
    }
    public function edit(Acquisition $acquisition)
    {
        return view("Acquisitions.edit", compact("acquisition"));
    }


    public function dafedit(Acquisition $acquisition)
    {
        return view("DAF/Acquisitions.edit", compact("acquisition"));
    }

    public function csafedit(Acquisition $acquisition)
    {
        return view("CSAF/Acquisitions.edit", compact("acquisition"));
    }

    public function adminedit(Acquisition $acquisition)
    {
        return view("Admin/Acquisitions.edit", compact("acquisition"));
    }
    public function show($id)
    {
        // Utilisez l'ID pour récupérer les détails de l'acquisition depuis la base de données
    $acquisition = Acquisition::findOrFail($id);

    // Stocker l'ID d'acquisition dans la session
    session(['current_acquisition_id' => $acquisition->id]);
    // Vérifiez si l'acquisition a été trouvée
    if (!$acquisition) {
        // Si l'acquisition n'est pas trouvée, redirigez l'utilisateur ou affichez un message d'erreur approprié.
        return redirect()->route('acquisitions')->with('error', 'Acquisition introuvable.');
    }
        return view('Acquisitions.show', compact('acquisition'));
    }


    public function dafshow($id)
    {
        // Utilisez l'ID pour récupérer les détails de l'acquisition depuis la base de données
    $acquisition = Acquisition::findOrFail($id);

    // Stocker l'ID d'acquisition dans la session
    session(['current_acquisition_id' => $acquisition->id]);
    // Vérifiez si l'acquisition a été trouvée
    if (!$acquisition) {
        // Si l'acquisition n'est pas trouvée, redirigez l'utilisateur ou affichez un message d'erreur approprié.
        return redirect()->route('acquisitions')->with('error', 'Acquisition introuvable.');
    }
        return view('DAF/Acquisitions.show', compact('acquisition'));
    }


    public function csafshow($id)
    {
        // Utilisez l'ID pour récupérer les détails de l'acquisition depuis la base de données
    $acquisition = Acquisition::findOrFail($id);

    // Stocker l'ID d'acquisition dans la session
    session(['current_acquisition_id' => $acquisition->id]);
    // Vérifiez si l'acquisition a été trouvée
    if (!$acquisition) {
        // Si l'acquisition n'est pas trouvée, redirigez l'utilisateur ou affichez un message d'erreur approprié.
        return redirect()->route('acquisitions')->with('error', 'Acquisition introuvable.');
    }
        return view('CSAF/Acquisitions.show', compact('acquisition'));
    }

    public function adminshow($id)
    {
        // Utilisez l'ID pour récupérer les détails de l'acquisition depuis la base de données
    $acquisition = Acquisition::findOrFail($id);

    // Stocker l'ID d'acquisition dans la session
    session(['current_acquisition_id' => $acquisition->id]);
    // Vérifiez si l'acquisition a été trouvée
    if (!$acquisition) {
        // Si l'acquisition n'est pas trouvée, redirigez l'utilisateur ou affichez un message d'erreur approprié.
        return redirect()->route('acquisitions')->with('error', 'Acquisition introuvable.');
    }
        return view('Admin/Acquisitions.show', compact('acquisition'));
    }

    public function update(Request $request, Acquisition $acquisition)
    {
        $acquisition->type_acquisitions = $request->input('type_acquisitions');
        $acquisition->source = $request->input('source');
        $acquisition->description = $request->input('description');
        $acquisition->save();

        return redirect()->route('acquisitions')->with('success', 'Acquisition mise à jour avec succès');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'type_acquisitions_id' => 'required',
            'source' => 'required',
            'description' => 'required',
        ]);

        // Créer une nouvelle acquisition avec les données du formulaire
        $acquisition = new Acquisition();
        $acquisition->type_acquisitions_id = $request->input('type_acquisitions_id');
        $acquisition->source = $request->input('source');
        $acquisition->description = $request->input('description');
        $acquisition->save();

        // Rediriger vers la page de liste des acquisitions avec un messsage de succès
        return redirect()->route('acquisitions')->with('success', 'Acquisition ajoutée avec succès !');
    }

    public function dafstore(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'type_acquisitions_id' => 'required',
            'source' => 'required',
            'description' => 'required',
        ]);

        // Créer une nouvelle acquisition avec les données du formulaire
        $acquisition = new Acquisition();
        $acquisition->type_acquisitions_id = $request->input('type_acquisitions_id');
        $acquisition->source = $request->input('source');
        $acquisition->description = $request->input('description');
        $acquisition->save();

        // Rediriger vers la page de liste des acquisitions avec un messsage de succès
        return redirect()->route('DAF/acquisitions')->with('success', 'Acquisition ajoutée avec succès !');
    }




    public function delete(Acquisition $acquisition)
    {
        $acquisition->delete();

        return back()->with('successDelete', 'Acquisition supprimé avec succès.');
    }

    public function dafdelete(Acquisition $acquisition)
    {
        $acquisition->delete();

        return back()->with('successDelete', 'Acquisition supprimé avec succès.');
    }






    /*public function getAcquisitionByType(Request $request)
    {
        $selectedTypeId = $request->input('type_d_acquisition_id');

        $acquisition = Acquisition::where('type_d_acquisition_id', $selectedTypeId)->first();
        $materiels = $acquisition ? $acquisition->materiels : collect();

        return view('acquisitions.index', compact('acquisition', 'materiels'));
    }*/

   /* public function storeMateriel(Request $request, Acquisition $acquisition)
    {
        dd($acquisition);
        // Validez les données du formulaire pour l'ajout du matériel
        $validatedData = $request->validate([
            'reference' => 'required',
        'nom' => 'required',
        'type_materiel' => 'required',
        'description' => 'required',
        'quantite' => 'required',
        'etat' => 'required',
        'type_d_acquisition_id' => 'required',
        ]);

        // Créez un nouveau modèle Materiel avec les données validées
        $materiel = new Materiel();
        $materiel->reference =$request->input('reference');
        $materiel->nom =$request->input('nom');
        $materiel->type_materiel =$request->input('type_materiel');
        $materiel->description =$request->input('description');
        $materiel->quantite =$request->input('quantite');
        $materiel->etat =$request->input('etat');
        $materiel->type_d_acquisition_id =$request->input('type_d_acquisition_id');


        // Associez le matériel à l'affectation en utilisant la relation (s'il y a une relation entre les modèles)
        $acquisition->materiels()->save($materiel);

        // Redirigez vers la page "show" de l'acquisition avec un message de succès
        return redirect()->route('acquisitions.show', ['acquisition' => $acquisition->id])->with('success', 'Matériel ajouté avec succès.');
    }*/
}
