@extends('layouts.masterDaf')

@section('content')
<div>
            <!-- Dans le contenu de la modal d'affectation -->
            <div>
                <div>Modification de l'affectation</div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form id="form_materiel" action="{{ route('DAF/affectations.update', ['affectation' => $affectation->id]) }}" method="POST">
                @csrf
                @method('PUT')
                        <div style="display: inline-block; margin-right: 30px;">
                            <label for="materiels_id">Reference :</label>
                    <select id="materiels_id" class="form-control" name="materiels_id">
                        @foreach ($materiels as $materiel)

                            <option value="{{$materiel->id}}"
                                selected>{{$materiel->reference}}</option>

                                <option value="{{ $materiel->id }}">{{ $materiel->reference }}</option>

                        @endforeach
                    </select>
                </div>
                        <div style="display: inline-block; margin-right: 30px;">
                            <label for="quantite_affecte">Quantité à affecter :</label>
                            <input type="number" class="form-control" name="quantite_affecte" id="quantite_affecte" min="1"
                                oninput="checkQuantiteAffecte()" value="{{ $affectation->quantite_affecte }}">
                            <div class="invalid-feedback" id="quantite-error" style="display: none;">
                                La quantité restante est épuisée. Impossible d'affecter ce matériel.
                            </div>
                        </div>
                        <div style="display: inline-block; margin-right: 30px;">
                            <label for="structures_id">Structures :</label>
                            <select id="structures_id" class="form-control" name="structures_id">
                                <option disabled selected>------------</option>
                                @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}">{{ $structure->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Autres champs nécessaires pour l'affectation -->
                        <div style="display: inline-block; margin-right: 30px;">
                            <button type="submit" class="btn btn-info">Affecter</button>
                            <a href="{{route('DAF/affectes')}}" class="btn btn-danger" >Fermer</a>
                        </div>
                    </div>
                </form>
            </div>


@endsection

