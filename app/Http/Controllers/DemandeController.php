<?php


namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function create()
    {
        $recepteurs = User::where('id', '!=', auth()->id())->get();
        return view('demande.create', compact('recepteurs'));
    }
    public function csafcreate()
    {
        $recepteurs = User::where('id', '!=', auth()->id())->get();
        return view('CSAF/demande.create', compact('recepteurs'));
    }

    public function dafcreate()
    {
        $recepteurs = User::where('id', '!=', auth()->id())->get();
        //   $demandes = Demande::all();
        return view('DAF/demande.create', compact('recepteurs', ));
    }
    public function store(Request $request)
    {
        // Valide et enregistre la demande dans la base de données
        $demande = new Demande();
        $demande->message = $request->input('message');
        $demande->emetteur_id = auth()->user()->id; // Assurez-vous de définir l'ID de l'émetteur
        $demande->destinataire_id = $request->input('destinataire_id');

        // Définissez le statut par défaut ("En cours")
        $demande->demande_statut_id = 'en_cours';

        // Enregistrez la demande
        $demande->save();

        return redirect()->route('demande', );
    }

    public function csafstore(Request $request)
    {
        // Valide et enregistre la demande dans la base de données
        $demande = new Demande();
        $demande->message = $request->input('message');
        $demande->emetteur_id = auth()->user()->id; // Assurez-vous de définir l'ID de l'émetteur
        $demande->destinataire_id = $request->input('destinataire_id');

        // Définissez le statut par défaut ("En cours")
        $demande->demande_statut_id = 'en_cours';

        // Enregistrez la demande
        $demande->save();

        return redirect()->route('CSAF/demande', );
    }

    public function dafstore(Request $request)
    {
        // Valide et enregistre la demande dans la base de données
        $demande = new Demande();
        $demande->message = $request->input('message');
        $demande->emetteur_id = auth()->user()->id; // Assurez-vous de définir l'ID de l'émetteur
        $demande->destinataire_id = $request->input('destinataire_id');

        // Définissez le statut par défaut ("En cours")
        $demande->demande_statut_id = 'en_cours';

        // Enregistrez la demande
        $demande->save();

        return redirect()->route('DAF/demande', );
    }
    public function index()
    {
        // Récupérer toutes les demandes sans filtre
        $demandes = Demande::with(['emetteur', 'destinataire'])->get();
        //$demandes = Demande::where('emetteur_id', auth()->user()->id)->get();
        return view('demande.demande', compact('demandes'));
    }
    public function csafindex()
    {
        // Liste des demandes de l'émetteur
        $demandes = Demande::where('emetteur_id', auth()->user()->id)->get();
        return view('CSAF/demande.demande', compact('demandes'));
    }
    public function dafindex()
    {
        // Liste des demandes de l'émetteur
        $demandes = Demande::where('destinataire_id', auth()->user()->id)->get();
        return view('DAF/demande.demande', compact('demandes'));
    }
    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        // Détails de la demande pour le destinataire
        return view('demande.voir', compact('demande'));
    }

    public function dafshow($id)
    {
        $demande = Demande::findOrFail($id);
        // Détails de la demande pour le destinataire
        return view('DAF/demande.voir', compact('demande'));
    }


    public function update(Request $request, $id)
    {
        // Validez les données du formulaire
        $request->validate([
            'demande_statut_id' => 'required|in:en_cours,traitee,favorable,non_favorable',
        ]);

        // Récupérez la demande
        $demande = Demande::findOrFail($id);

        // Mettez à jour le champ 'demande_statut_id'
        $demande->demande_statut_id = $request->input('demande_statut_id');

        // Enregistrez les modifications de la demande
        $demande->save();

        return redirect()->route('demande.show', ['id' => $id]);
    }

    public function dafupdate(Request $request, $id)
    {
        // Validez les données du formulaire
        $request->validate([
            'demande_statut_id' => 'required|in:en_cours,traitee,favorable,non_favorable',
        ]);

        // Récupérez la demande
        $demande = Demande::findOrFail($id);

        // Mettez à jour le champ 'demande_statut_id'
        $demande->demande_statut_id = $request->input('demande_statut_id');

        // Enregistrez les modifications de la demande
        $demande->save();

        return redirect()->route('DAF/demande.show', ['id' => $id]);
    }

}


