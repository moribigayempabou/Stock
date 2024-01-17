@extends('layouts.masterCsaf')

@section('content')
    <div class="container">
        <h1>Saisir la quantité à retourner</h1>

        <form method="POST" action="{{ route('CSAF/retourner-materiel') }}">
            @csrf

            <div class="form-group">
                <label for="quantite_retournee">Quantité à retourner :</label>
                <input type="number" class="form-control" id="quantite_retournee" name="quantite_retournee" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection
