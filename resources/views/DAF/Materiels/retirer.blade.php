@extends("layouts.masterDaf")

@section("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Affecter un matériel</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('DAF/materiels.affecter', $materiel->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="quantite_affecte" class="col-md-4 col-form-label text-md-right">Quantité affectée</label>

                            <div class="col-md-6">
                                <input id="quantite_affecte" type="number" class="form-control @error('quantite_affecte') is-invalid @enderror" name="quantite_affecte" required autocomplete="quantite_affecte" autofocus>

                                @error('quantite_affecte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Affecter
                                </button>
                                <a href="{{ route('DAF/materiels') }}" class="btn btn-secondary">Retour</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
