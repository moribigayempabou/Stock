@extends('layouts.masterDaf')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex justify-content-left mb-2">
                    <a href="{{ route('DAF/demande') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Retour</a>
                </div><br>
                <div class="card-header">Détails de la demande</div>

                <div class="card-body">
                    <p><strong>Émetteur :</strong> {{ $demande->emetteur->roles->type_utilisateur }} - {{ optional($demande->emetteur)->structures->nom }}</p>
                    <p><strong>Message :</strong> {{ $demande->message }}</p>

                    @if ($demande->demande_statut_id === 'en_cours')
                    <div class="alert alert-warning">En cours</div>
                    <div class="mb-3">
                        <form method="POST" action="{{ route('DAF/demande.dafupdate', ['id' => $demande->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="demande_statut_id">Traitement :</label>
                                <select class="form-control" id="demande_statut_id" name="demande_statut_id">
                                    <option value="favorable">Favorable</option>
                                    <option value="non_favorable">Non favorable</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
