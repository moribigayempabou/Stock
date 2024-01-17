
@extends("layouts.masterDaf")

@section("content")
<!-- Formulaire pour retourner un matériel dans le stock -->
<h1>Retourner un matériel dans le stock</h1>
<form action="{{ route('DAF/materiels.retourner', $materiel->id) }}" method="post">
    @csrf
    <label for="reference">Nom du matériel :</label>
    <input type="text" name="reference" value="{{ $materiel->reference }}" readonly>
    <br>
    <label for="nom">Nom du matériel :</label>
    <input type="text" name="nom" value="{{ $materiel->nom }}" readonly>
    <br>
    <label for="quantite">Quantité :</label>
    <input type="number" name="quantite" value="1" required>
    <br>
    <button type="submit">Retourner dans le stock</button>
</form>
@endsection
