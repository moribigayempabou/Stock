@extends('layouts.masterDaf')

@section('content')


<div class="my-2 p-2 bg-body rounded shadow-sm">

    <!-- Affichage du message de succès ici -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong> <p class="card-title">Liste des matériels affectés</p></strong>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input type="text" class="form-control" id="search_user" onkeyup="searchUserByName()" placeholder="Rechercher par reference">
                  <div class="input-group-append">
                    <button class="btn btn-default" type="button">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>

        </div>
        </div>
        {{ $affectations->links() }}
    <table class="table table-bordered border-secondary">

            <thead style="background-color: rgb(53, 105, 250) ; ">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Réf</th>
                    <th scope="col">Qte.Aff</th>
                    <th scope="col">description</th>
                    <th scope="col">Structures</th>
                    <th scope="col">Date.Aff</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($affectations as $affectation)
            <tr>
                <!-- Colonnes existantes... -->
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $affectation->materiels->reference }}</td>
                <td>{{ $affectation->quantite_affecte }}</td>
                <td>{{ $affectation->description }}</td>
                <td>{{ $affectation->structures->nom }}</td>
                <td>{{ $affectation->created_at }}</td>
                <td>
                    {{--<a href="{{ route('DAF/affectations.edit', ['affectation' => $affectation->id]) }}" class="btn btn-info me-2">
                       Editer <i class="fas fa-pencil-alt"></i> <!-- Utiliser l'icône de modification de Font Awesome ici -->
                    </a>--}}
                    <a href="{{ route('DAF/affectation.retouner', ['id' => $affectation->id]) }}" class="btn btn-warning">
                        Retourner <!-- Utiliser l'icône de modification de Font Awesome ici -->
                    </a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
