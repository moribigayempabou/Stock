@extends('layouts.master')

@section('content')

<!-- Dans le contenu de la modal d'affectation -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="my-4 p-4 bg-body rounded shadow-sm">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste de matériels non affectés</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" class="form-control" id="search_materiel" onkeyup="searchMateriel()" placeholder="Rechercher par nom">
              <div class="input-group-append">
                <button class="btn btn-default" type="button">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>

    </div>
    </div>
    {{ $materiels->links() }}
<table id="materiels_table" class="table table-bordered">
    <thead style="background-color: rgb(97, 252, 208) ; ">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Réf</th>
            <th scope="col">Nom</th>
            <th scope="col">Type</th>
            <th scope="col">Details</th>
            <th scope="col">Qte.init</th>
            <th scope="col">Qte.dispo</th>
            <th scope="col">Etat</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">


@foreach ($materiels as $materiel)
    <tr>
        <!-- Colonnes existantes... -->
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{ $materiel->reference }}</td>
        <td>{{ $materiel->nom }}</td>
        <td>{{ $materiel->type_materiel }}</td>
        <td>{{ $materiel->description }}</td>
        <td>{{ $materiel->quantite }}</td>
        <td>{{ $materiel->quantite_reste }}</td>
        <td>{{ $materiel->etat }}</td>
        <td>
            @if ($materiel->quantite_reste > 0)
                <a href="{{ route('Affectations.edite', ['materiel' => $materiel->id]) }}" class="btn btn-info me-2 affecter-btn" data-materiel-id="{{ $materiel->id }}">
                    Affecter
                </a>
            @else
                <a href="#" class="btn btn-red me-2 disabled"  style="color: red" data-materiel-id="{{ $materiel->id }}">
                    Affecter
                </a>
            @endif
        </td>
    </tr>
@endforeach
 </table>
</div>
@endsection




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Désactiver les boutons avec la classe 'disabled-btn'
        $(".disabled").prop('disabled', true);
    });
</script>
<script>
    function searchMateriel() {
      var input, filter, table, tr, tdName, i, txtValueName;
      input = document.getElementById("search_materiel");
      filter = input.value.toUpperCase();
      table = document.getElementById("materiels_table");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        tdName = tr[i].getElementsByTagName("td")[2]; // Index de la colonne du nom

        if (tdName) {
          txtValueName = tdName.textContent || tdName.innerText;

          if (txtValueName.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script>
<script>
    $(document).ready(function () {
        $(".affecter-btn").click(function () {

            const url = `/affectations/${materielId}/affecter`;

            const data = {
                quantite: quantite_affecte // Envoyer la quantité à affecter
            };

            $.ajax({
                type: "POST",
                url: url,
                data: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function (response) {
                    // Mettez à jour l'affichage si nécessaire
                    location.reload(); // Recharge la page pour afficher les changements
                },
                error: function (error) {
                    console.error("Une erreur s'est produite :", error);
                }
            });
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function searchMateriel() {
        var searchTerm = $('#search_input').val();
        $.ajax({
            type: 'GET',
            url: '/votre-endpoint-de-recherche', // Remplacez par l'URL de votre endpoint de recherche
            data: { query: searchTerm },
            success: function (data) {
                // Mettez à jour votre interface utilisateur avec les résultats de la recherche
                // Vous pouvez remplacer cette étape avec le code nécessaire pour afficher les résultats.
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>






