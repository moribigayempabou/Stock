@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer une nouvelle demande</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('demande.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="destinataire_id">Sélectionnez le destinataire</label>
                                <select name="destinataire_id" id="destinataire_id" class="form-control">
                                    <option value="">Sélectionnez le destinataire</option>
                                    @foreach($recepteurs as $recepteur)
                                        <option value="{{ $recepteur->id }}">{{ $recepteur->roles->type_utilisateur }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Créer la demande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
