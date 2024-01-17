

@extends('layouts.masterDaf')

@section('content')


<h4 class="mb-3">Liste des matériels non affectés</h4>
    <form>
        @foreach ($acquisition->materiels as $materiel)
            @if ($materiel->quantite_affecte == 0)
                <div>
                    {{ $materiel->reference }} - {{ $materiel->nom }} -{{ $materiel->quantite }}
                </div>
            @endif
        @endforeach
    </form>




@endsection
