@extends("layouts.masterDaf")

@section("content")

<form action="{{ route('DAF/materiels.dafupdate', ['materiel' => $materiel->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="display: inline-block; margin-right: 30px;">
        <label for="reference">Reference :</label>
        <input type="text" name="reference" value="{{ $materiel->reference }}">
    </div>
    <div style="display: inline-block; margin-right: 30px;">
        <label for="nom">Nom du matériel :</label>
        <input type="text" name="nom" value="{{ $materiel->nom }}">
    </div>
    <div style="display: inline-block; margin-right: 30px;">
        <label for="type_materiel">Type de matériel :</label>
        <select name="type_materiel" value="{{ $materiel->type_materiel }}">
            <option disabled selected>------------</option>

            <option>Imprimante</option>
            <option>Informatique</option>
            <option>Consommable</option>
            <option>Logiciel</option>

        </select>
    </div><br><br><br>
    <div style="display: inline-block; margin-right: 30px;">
        <label for="description">Description :</label>
        <input type="text" name="description" value="{{ $materiel->description }}">
    </div>
    <div style="display: inline-block; margin-right: 30px;">
        <label for="quantite">Quantité :</label>
        <input type="number" name="quantite" value="{{ $materiel->quantite }}">
    </div>
    <div style="display: inline-block; margin-right: 30px;">
        <label for="etat">Etat du matériel :</label>
        <select name="etat" value="{{ $materiel->etat }}">
            <option disabled selected>------------</option>
            <option>Bon</option>
            <option>Nouveau fonctionnel</option>
            <option>Ancien fonctionnel</option>
            <option>Mauvais</option>
        </select>
    </div><br><br>

    <!-- Nouvelle div pour les boutons alignée à droite -->
    <div style="display: inline-block; margin-right: 10px;">
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{ route('DAF/materiels') }}" class="btn btn-danger">Annuler</a>
    </div>
</form>



    </div>
@endsection
