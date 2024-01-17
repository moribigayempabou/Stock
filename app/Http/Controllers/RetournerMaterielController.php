<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use Illuminate\Http\Request;

class RetournerMaterielController extends Controller
{
    public function showForm()
    {
        return view('Affectation.retouner');
    }

    public function retournerMateriel(Request $request)
    {
        // Validez et traitez la quantité retournée ici
        $quantiteRetourne = $request->input('quantite_retourne');

        // Faites ce que vous devez faire avec la quantité retournée, par exemple, la stocker en base de données

        return redirect()->route('saisir-quantite-retournee')->with('success', 'Quantité retournée avec succès.');
    }

    public function create()
    {
        // Vous pouvez passer des données nécessaires à la vue ici, par exemple, la liste des affectations en cours.
        $affectationsEnCours = Affectation::where('statut', 'en_cours')->get();

        return view('retourner.create', compact('affectationsEnCours'));
    }

    public function csafcreate()
    {
        // Vous pouvez passer des données nécessaires à la vue ici, par exemple, la liste des affectations en cours.
        $affectationsEnCours = Affectation::where('statut', 'en_cours')->get();

        return view('CSAF/retourner.create', compact('affectationsEnCours'));
    }


    public function index()
    {
        // Récupérez les affectations avec le statut "retourné" ou tout autre statut approprié.
        $affectationsRetournees = Affectation::where('statut', 'retourne')->get();

        return view('retourner.index', compact('affectationsRetournees'));
    }
}
