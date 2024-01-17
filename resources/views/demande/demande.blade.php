@extends('layouts.master')
@section('content')

        <div class="my-2 p-2 bg-body rounded shadow-sm">



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des demandes</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <div class="input-group input-group-sm" style="width: 200px;">
                                        <!-- Ajoutez des champs de date de début et de fin ici -->

                                        <input type="date" class="form-control" id="date_debut" placeholder="Date de début">
                                        <input type="date" class="form-control" id="date_fin" placeholder="Date de fin">
                                        <button class="btn btn-primary" onclick="searchMaterielByDate()">Filtrer</button>
                                    </div>

                                  </div>
                                </div>
                              </div>

                        </div>

                        <div class=" text-end mt-3">
                            <a class="btn btn-success" href="{{ route('demande.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Créer demande</a>
                        </div><br>
                    <div class="card-body">

                        <table class="table table-bordered text-nowrap">
                            <thead style="background-color: rgb(139, 175, 246);">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Émetteur</th>
                                    <th scope="col">Récepteur</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>
                                        @if ($demande->emetteur)
                                            {{ optional($demande->emetteur->roles)->type_utilisateur }} - {{ optional($demande->emetteur->structures)->nom }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($demande->destinataire)
                                            {{ optional($demande->destinataire->roles)->type_utilisateur }} - {{ optional($demande->destinataire->structures)->nom }}
                                        @endif
                                    </td>

                                    {{--<td>{{ optional($demande->emetteur)->name }}</td>
                                    <td>{{ optional($demande->destinataire)->name }}</td>--}}


                                    <td scope="row" style="white-left: pre-wrap;">
                                        {{ $demande->message }}
                                    </td>

                                    <td>
                                        @if ($demande->demande_statut_id === 'en_cours')
                                            <span class="badge badge-warning">En cours</span>
                                            <td>
                                            <a href="{{ route('demande.update', ['id' => $demande->id]) }}">traiter</a>

                                    </td>
                                        @elseif ($demande->demande_statut_id === 'traitee')
                                            <span class="badge badge-success">Traitée</span>
                                        @elseif ($demande->demande_statut_id === 'favorable')
                                            <span class="badge badge-info">Favorable</span>
                                        @elseif ($demande->demande_statut_id === 'non_favorable')
                                            <span class="badge badge-danger">Non favorable</span>
                                        @endif
                                    </td>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

@endsection


