@extends('layouts.masterDaf')

@section('content')

<form action="{{ route('DAF/affectations.store', ['affectation' => $materiel->id]) }}" method="POST">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br>
    @endif

    <div  style="display: inline-block; margin-right: 30px;">
        <label for="reference">Reference :</label>
        <input type="text" class="form-control" name="reference" id="reference" value="{{ $materiel->reference }}" readonly>
    </div>

    <div style="display: inline-block; margin-right: 30px;">
        <label for="quantite_affecte">Quantité à affecter :</label>
        <input type="number" class="form-control" name="quantite_affecte" id="quantite_affecte" min="1"
            oninput="updateQuantiteRestante()" value="{{ $materiel->quantite_affecte ?? 1 }}">
        <div class="invalid-feedback" id="quantite-error" style="display: none;">
            La quantité restante est épuisée. Impossible d'affecter ce matériel.
        </div>
    </div>
    <div  style="display: inline-block; margin-right: 30px;">
        <label for="quantite_reste">Quantité Restante :</label>
        <input type="number" name="quantite_reste"class="form-control" id="quantite_reste" min="0" readonly>
    </div>
    <div  style="display: inline-block; margin-right: 30px;">
        <label for="description">Description :</label>
        <input type="text" name="description"class="form-control" id="description" >
    </div>
    <div  style="display: inline-block; margin-right: 30px;" >
        <label for="structures_id">Structures :</label>
        <select id="structures_id"  name="structures_id" class="form-control">
            <option disabled selected>------------</option>
            @foreach ($structures as $structure)
                <option value="{{ $structure->id }}">{{ $structure->nom }}</option>
            @endforeach
        </select>
    </div><br>
    <!-- Autres champs nécessaires pour l'affectation -->
    <div  style="display: inline-block; margin-right: 30px;" class="modal-footer">
        <button type="submit" class="btn btn-info" id="affecterBtn">Affecter</button>
        <a href="{{route('DAF/affectations')}}" class="btn btn-danger">Annuler</a>
    </div>
</form>

<script>
    const quantiteInitiale = parseInt("{{ $materiel->quantite }}");

    function updateQuantiteRestante() {
        const quantiteAffecte = parseInt($("#quantite_affecte").val());
        const quantiteRestante = Math.max(0, quantiteInitiale - quantiteAffecte);

        $("#quantite_reste").val(quantiteRestante);

        if (quantiteAffecte > quantiteInitiale) {
            $("#quantite_affecte").addClass("is-invalid");
            $("#affecterBtn").prop("disabled", true); // Désactiver l'affectation si quantité dépassée
        } else {
            $("#quantite_affecte").removeClass("is-invalid");
            $("#affecterBtn").prop("disabled", false); // Autoriser l'affectation
        }
    }

    // Écoutez les changements dans le champ "Quantité à affecter"
    $("#quantite_affecte").on("input", updateQuantiteRestante);

    // Appelez updateQuantiteRestante au chargement de la page pour afficher la quantité restante initiale
    $(document).ready(function() {
        updateQuantiteRestante();
    });
</script>

@endsection
