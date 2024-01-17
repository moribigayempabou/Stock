@extends("layouts.master")

@section("content")
<div class="my-2 p-2 bg-body rounded shadow-sm">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Acquisition</strong></h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                   <a href="{{ route('acquisitions') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Retour</a>
                  <div class="input-group-append">

                  </div>
                </div>
              </div>

        </div>
        </div>
    <!-- Affichage du message de succès ici -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Ajouter un matériel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_materiel" action="{{ route('materiels.store') }}" method="POST">
                    @csrf
                    <div class="modal-body" id="mediumBody">

                        <div class="form-group">
                            <label for="reference">Référence :</label>
                            <input type="text" class="form-control" name="reference" id="reference">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom du matériel :</label>
                            <input type="text" class="form-control" name="nom" id="nom">
                        </div>
                        <div class="form-group">
                            <label for="type_materiel">Type de matériel :</label>
                            <select name="type_materiel" class="form-control">
                                <option disabled selected>------------</option>

                                    <option> Imprimante</option>
                                    <option> Informatique</option>
                                    <option> Consommable</option>
                                    <option> Logiciel</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                        <div style="display: inline-block; margin-right: 8px;">
                            <label for="quantite">Quantité :</label>
                            <input type="number"  name="quantite" class="form-control" id="quantite" min="1">
                        </div>
                        <div  style="display: inline-block; margin-right: 8px;">
                            <label for="etat">État du matériel :</label>
                                <select name="etat" class="form-control">
                                    <option disabled selected>------------</option>
                                        <option> Bon</option>
                                        <option> Nouveau fonctionnel</option>
                                        <option> Ancien fonctionnel</option>
                                        <option> Mauvais</option>

                                </select>
                        </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Ajouter</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>



        <div>
            <h5 style="color: blue"><strong>Détails de l'acquisition</strong></h5>
            <p>Numero d'acquisition : {{ $acquisition->id}}</p>
            <p>Type d'acquisition: {{ $acquisition->type_acquisitions->libelle }}</p>
            <p>Sources : {{ $acquisition->source }}</p>
            <p>Description : {{ $acquisition->description }}</p>
            <p>Date d'acquisition : {{ $acquisition->created_at }}</p><br>
 </div>
 <div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des matériels acquis</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" class="form-control" id="search_reference" onkeyup="searchMaterielByReference()" placeholder="Rechercher par nom">
                    <div class="input-group-append">
                        <button class="btn btn-default" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal" title="Ajouter un matériel">
                    Ajouter<i class="fas fa-plus-circle"></i>
                </a>

            </div><br><br>
            <h4><strong></strong></h4>
            <table id="materiels_list" class="table table-bordered">
                <thead style="background-color: rgb(97, 236, 252) ; ">
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
        @foreach ($acquisition->materiels as $materiel)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $materiel->reference }}</td>
                <td>{{ $materiel->nom }}</td>
                <td>{{ $materiel->type_materiel }}</td>
                <td>{{ $materiel->description }}</td>
                <td>{{ $materiel->quantite }}</td>
                <td>{{ $materiel->etat }}</td>

                <td>


                    <div class="d-flex">
                        <a href="{{ route('materiels.edit', ['materiel' => $materiel->id]) }}" class="btn btn-info me-2">
                            <i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('materiels.show', ['id' => $materiel->id]) }}" class="btn btn-primary me-2">
                            <i class="far fa-eye"></i></a>
                            <a href="#" onclick="event.preventDefault(); showConfirmationModal({{$materiel->id}});"
                                class="btn btn-danger">
                                 <i class="fas fa-trash-alt"></i>
                             </a>
                             <!-- Modal pour la confirmation -->
         <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmation de la suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer ce matériel ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <form id="form-{{$materiel->id}}" method="POST" action="{{ route('materiels.delete', $materiel->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection

<script>
    function showConfirmationModal(demandeId) {
        var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        modal.show();
        var deleteForm = document.getElementById('form-' + demandeId);
        deleteForm.addEventListener('submit', function (event) {
            modal.hide();
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('#form_materiel').submit(function (e) {
            e.preventDefault();

            // Récupérer l'ID de l'acquisition actuelle
            var currentAcquisitionId = {{ $acquisition->id }};

            var formData = $(this).serializeArray();

            // Ajouter l'ID de l'acquisition aux données
            formData.push({ name: 'acquisitions_id', value: currentAcquisitionId });

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
    // Données de test (à remplacer par vos données réelles)


    // Fonction pour mettre à jour la liste des noms de matériels en fonction de la recherche
    function searchMaterielByReference() {
        const searchInput = document.getElementById("search_reference").value.toLowerCase();
        const materiels_list = document.getElementById("materiels_list");

        // Effacer le contenu actuel du conteneur de liste
        materiels_list.innerHTML = "";

        if (searchInput === "") {
            // Si le champ de recherche est vide, afficher la liste complète des matériels
            displayMateriels();
        } else {
            // Sinon, filtre et affiche les matériels correspondants à la recherche
            const filteredMateriels = materiels.filter(materiel => materiel.nom.toLowerCase().includes(searchInput));
            filteredMateriels.forEach(materiel => {
                const li = document.createElement("li");
                li.textContent = materiel.nom;
                materiels_list.appendChild(li);
            });
        }
    }
</script>




