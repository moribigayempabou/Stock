<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Affectation;
use App\Models\Materiel;
use Illuminate\Support\Facades\DB;


class StatistiqueController extends Controller
{
    public function index()

    { // Récupérer les données pour les acquisitions depuis la base de données en utilisant Eloquent
       /* $acquisitionsData = DB::table('materiels')
            ->select( DB::raw('SUM(quantite) as total_amount'))
            ->get();

        // Récupérer les données pour les affectations depuis la base de données en utilisant Eloquent
        $affectationsData = DB::table('affectations')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(quantite_affecte) as total_amount'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->get();

        // Organisez les données pour le graphique
        $months = $acquisitionsData->pluck('month')->toArray();
        $acquisitions = $acquisitionsData->pluck('total_amount')->toArray();
        $affectations = $affectationsData->pluck('total_amount')->toArray();
        $materiels= Materiel::all();
        // Charger la vue du graphique et passer les données
        return view('statistiques', compact('months', 'acquisitions', 'affectations','materiels'));
    }*/



    // Récupérez les données de la base de données
    $donneesStatistiques = Materiel::select(
        DB::raw('MONTH(created_at) as mois'),
        DB::raw('YEAR(created_at) as annee'),
        DB::raw('SUM(quantite) as quantite')
    )
    ->groupBy('mois', 'annee')
    ->orderBy('annee')
    ->orderBy('mois')
    ->get();

        // Convertissez les numéros de mois en noms de mois
    $moisEnLettres = [
        'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ];

    foreach ($donneesStatistiques as $statistique) {
        $statistique->mois = $moisEnLettres[$statistique->mois - 1]; // Soustrayez 1 car les mois commencent à 1
    }

    return view('statistiques', compact('donneesStatistiques'));
}



public function dafindex()

{ // Récupérer les données pour les acquisitions depuis la base de données en utilisant Eloquent
   /* $acquisitionsData = DB::table('materiels')
        ->select( DB::raw('SUM(quantite) as total_amount'))
        ->get();

    // Récupérer les données pour les affectations depuis la base de données en utilisant Eloquent
    $affectationsData = DB::table('affectations')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(quantite_affecte) as total_amount'))
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->get();

    // Organisez les données pour le graphique
    $months = $acquisitionsData->pluck('month')->toArray();
    $acquisitions = $acquisitionsData->pluck('total_amount')->toArray();
    $affectations = $affectationsData->pluck('total_amount')->toArray();
    $materiels= Materiel::all();
    // Charger la vue du graphique et passer les données
    return view('statistiques', compact('months', 'acquisitions', 'affectations','materiels'));
}*/



// Récupérez les données de la base de données
$donneesStatistiques = Materiel::select(
    DB::raw('MONTH(created_at) as mois'),
    DB::raw('YEAR(created_at) as annee'),
    DB::raw('SUM(quantite) as quantite')
)
->groupBy('mois', 'annee')
->orderBy('annee')
->orderBy('mois')
->get();

    // Convertissez les numéros de mois en noms de mois
$moisEnLettres = [
    'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
];

foreach ($donneesStatistiques as $statistique) {
    $statistique->mois = $moisEnLettres[$statistique->mois - 1]; // Soustrayez 1 car les mois commencent à 1
}

return view('DAF.statistiques', compact('donneesStatistiques'));
}
    public function show()
{
    // Récupérer les données des matériaux acquis depuis la base de données
    $acquiredData = Acquisition::orderBy('created_at', 'asc')->get();

    // Récupérer les données des matériaux affectés depuis la base de données
    $affectedData = Affectation::orderBy('created_at', 'asc')->get();

    // Autres données nécessaires pour le graphique
    $labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'];
    $donnees = [10, 20, 15, 30, 25, 40, 35];

    return view('statistiques', compact('acquiredData', 'affectedData', 'labels', 'donnees'));
}

public function csafindex()

{ // Récupérer les données pour les acquisitions depuis la base de données en utilisant Eloquent
   /* $acquisitionsData = DB::table('materiels')
        ->select( DB::raw('SUM(quantite) as total_amount'))
        ->get();

    // Récupérer les données pour les affectations depuis la base de données en utilisant Eloquent
    $affectationsData = DB::table('affectations')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(quantite_affecte) as total_amount'))
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->get();

    // Organisez les données pour le graphique
    $months = $acquisitionsData->pluck('month')->toArray();
    $acquisitions = $acquisitionsData->pluck('total_amount')->toArray();
    $affectations = $affectationsData->pluck('total_amount')->toArray();
    $materiels= Materiel::all();
    // Charger la vue du graphique et passer les données
    return view('statistiques', compact('months', 'acquisitions', 'affectations','materiels'));
}*/



// Récupérez les données de la base de données
$donneesStatistiques = Materiel::select(
    DB::raw('MONTH(created_at) as mois'),
    DB::raw('YEAR(created_at) as annee'),
    DB::raw('SUM(quantite) as quantite')
)
->groupBy('mois', 'annee')
->orderBy('annee')
->orderBy('mois')
->get();

    // Convertissez les numéros de mois en noms de mois
$moisEnLettres = [
    'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
];

foreach ($donneesStatistiques as $statistique) {
    $statistique->mois = $moisEnLettres[$statistique->mois - 1]; // Soustrayez 1 car les mois commencent à 1
}

return view('CSAF.statistiques', compact('donneesStatistiques'));
}

}
