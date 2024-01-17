@extends("layouts.master")

@section("content")
<div class="my-2 p-2 bg-body rounded shadow-sm">

    <div class="d-flex justify-content-left mb-2">
        <a href="{{ route('acquisitions') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Retour</a>
    </div><br>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des matériels acquis</h3>
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

    {{ $materiels->links() }}
</div><br>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

            <div class="card-body table-responsive p-0">
    <table id="myDataTable" class="table table-hover text-nowrap ">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Réf</th>
                <th scope="col">Nom</th>
                <th scope="col">Type</th>
                <th scope="col">Details</th>
                <th scope="col">Quantité</th>
                <th scope="col">État</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($materiels as $materiel)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $materiel->reference }}</td>
                <td>{{ $materiel->nom }}</td>
                <td>{{ $materiel->type_materiel }}</td>
                <td>{{ $materiel->description }}</td>
                <td>{{ $materiel->quantite }}</td>
                <td>{{ $materiel->etat }}</td>
            {{-- <td>{{ $materiel->acquisitions->type_acquisitions->libelle }}</td> --}}

                <td>

                        <a href="{{ route('materiels.show', ['id' => $materiel->id]) }}" class="btn btn-primary me-2">
                          Details  <i class="far fa-eye"></i>
                        </a>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script>
    function searchMaterielByReference() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search_reference");
        filter = input.value.toUpperCase();
        table = document.getElementById("materiels_table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    $(document).ready(function () {
        $('#form_materiel').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            $.ajax({
                type: "POST",
                url: "{{ route('materiels.store') }}",
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        alert('Matériel ajouté avec succès.');
                        window.location.reload();
                    } else {
                        alert('Erreur lors de l\'ajout du matériel: ' + data.error);
                    }
                }

            });
        });
    });
</script>

<script>
    function searchMaterielByDate() {
        var dateDebut = document.getElementById("date_debut").value;
        var dateFin = document.getElementById("date_fin").value;

        // Redirigez vers la route avec les dates sélectionnées
        window.location.href = "{{ route('materiels') }}?date_debut=" + dateDebut + "&date_fin=" + dateFin;
    }
</script>
@endsection
