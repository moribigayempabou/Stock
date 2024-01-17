@extends("layouts.masterDaf")

@section("content")

<div class="my-4 p-4 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-4 mb-3">Modification d'une acquisition</h3>

    <div class="mt-4">
        <form action="{{ route('DAF/acquisitions.dafupdate', ['acquisition' => $acquisition->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Type d'acquisition</label>
                <input type="text" class="form-control" name="type_acquisition" value="{{ $acquisition->type_acquisition }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Date d'acquisition</label>
                <input type="text" class="form-control" name="updated_at" value="{{ $acquisition->updated_at }}">
            </div>
            <div>
                <button type="submit" class="btn btn-info">Enregistrer</button>
                <a href="{{ route('DAF/acquisitions') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>

</div>

@endsection
