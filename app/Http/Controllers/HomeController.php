<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Materiel;
use App\Models\Stock; // Assurez-vous d'importer le modèle Stock
use App\Models\User;
use Illuminate\Support\Facades\View;
class HomeController extends Controller
{

    public function __construct()
    {
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        $stockActuel = Stock::sum('quantite');
        $quantiteAcquis = Materiel::sum('quantite');
        $userCount = User::count();
        View::share('quantiteAffecte','stockActuel','quantieAcquis','userCount',$quantiteAffecte, $stockActuel,$quantiteAcquis,$userCount);
    }


    public function index()

    {
        $stockActuel = Stock::sum('quantite');
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        $quantiteAcquis = Materiel::sum('quantite');
        $userCount = User::count();
        return view('home', compact('stockActuel','quantiteAffecte','quantiteAcquis','userCount'));
    }


    public function dafindex()

    {
        $stockActuel = Stock::sum('quantite');
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        $quantiteAcquis = Materiel::sum('quantite');
        $userCount = User::count();
        return view('DAF.acceuil', compact('stockActuel','quantiteAffecte','quantiteAcquis','userCount'));
    }


    public function csafindex()

    {
        $stockActuel = Stock::sum('quantite');
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        $quantiteAcquis = Materiel::sum('quantite');
        $userCount = User::count();
        return view('CSAF.acceuil', compact('stockActuel','quantiteAffecte','quantiteAcquis','userCount'));
    }
}
