@extends('layouts.master')

@section('content')
    <div class="card">
        <h4 style=" color: #007BFF;"><strong>Détails du matériel</strong></h4><br>
        <div>
            <p><strong>Reference:</strong> {{ $materiels->reference }}</p>
            <p><strong>Nom:</strong> {{ $materiels->nom }}</p>
            <p><strong>Type:</strong> {{ $materiels->type_materiel }}</p>
            <p><strong>Détails:</strong> {{ $materiels->description }}</p>
            <p><strong>Quantité:</strong> {{ $materiels->quantite }}</p>
            <p><strong>État:</strong> {{ $materiels->etat }}</p>


        </div>
    </div>
@endsection

<style>
    /* CSS personnalisé pour limiter la largeur du champ d'affichage */
    .card {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f7f7f7;
    }

    .card p {
        margin-bottom: 10px;
    }
</style>
