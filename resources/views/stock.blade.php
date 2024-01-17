@extends('layouts.master')

@section('content')
    <h1>Stock disponible</h1>

    <p>Quantité en stock : {{ $quantiteEnStock }}</p>

    <p>Quantité affecté : {{ $quantiteAffecte}}</p>

    @if($quantiteEnStock <= 40)
    <div class="alert alert-danger">
        <p>Alerte : La quantité en stock est faible !</p>
    </div>
@endif
@endsection
