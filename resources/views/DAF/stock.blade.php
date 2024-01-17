@extends('layouts.masterDaf')

@section('content')
    <h1>Stock disponible</h1>

    <p>Quantité en stock : {{ $quantiteEnStock }}</p>

    <p>Quantité affecté : {{ $quantiteAffecte}}</p>
@endsection
