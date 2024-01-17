@extends('layouts.masterCsaf')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste des demandes</div>

                    <div class=" text-end mt-3">
                        <a class="btn btn-success" href="{{ route('CSAF/demande.csafcreate') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Nouveau</a>
                    </div>
                    <div class="card-body">
                        @if($demandes->isEmpty())
                            <p>Aucune demande créée pour le moment.</p>
                        @else
                            <table class="table table-bordered text-nowrap">
                                <thead style="background-color: rgb(139, 175, 246);">
                                <tr>
                                    <th scope="col">N°</th>

                                    <th scope="col">Destinataire</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($demandes as $demande)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>

                                        {{--<td>{{ optional($demande->destinataire)->roles->type_utilisateur }} - {{ optional($demande->destinataire)->structures->nom }}</td>--}}
                                        <td>
                                            @if ($demande->destinataire)
                                                {{ optional($demande->destinataire->roles)->type_utilisateur }} - {{ optional($demande->destinataire->structures)->nom }}
                                            @endif
                                        </td>


                                        <td>
                                            {{ $demande->message }}</a>
                                        </td>

                                        <td>
                                            @if ($demande->demande_statut_id === 'en_cours')
                                                <span class="badge badge-warning">En cours</span>
                                            @elseif ($demande->demande_statut_id === 'traitee')
                                                <span class="badge badge-success">Traitée</span>
                                            @elseif ($demande->demande_statut_id === 'favorable')
                                                <span class="badge badge-info">Favorable</span>
                                            @elseif ($demande->demande_statut_id === 'non_favorable')
                                                <span class="badge badge-danger">Non favorable</span>
                                            @endif
                                        </td>



                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
