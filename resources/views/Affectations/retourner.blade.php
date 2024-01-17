@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Saisir la quantité à retourner</h1>

        <form method="POST" action="{{ route('retourner-materiel') }}">
            @csrf

            <div class="form-group">
                <label for="quantite_retournee">Quantité à retourner :</label>
                <input type="number" class="form-control" id="quantite_retournee" name="quantite_retournee" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection

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
