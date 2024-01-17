<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Stock;
class StockController extends Controller
{
    public function index()
    {
        $quantiteEnStock = Stock::sum('quantite');
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        return view('stock', compact('quantiteEnStock','quantiteAffecte'));
    }

    public function dafindex()
    {
        $quantiteEnStock = Stock::sum('quantite');
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        return view('DAF.stock', compact('quantiteEnStock','quantiteAffecte'));
    }


    public function csafindex()
    {
        $quantiteEnStock = Stock::sum('quantite');
        $quantiteAffecte = Affectation::sum('quantite_affecte');
        return view('CSAF.stock', compact('quantiteEnStock','quantiteAffecte'));
    }
// ...


}
