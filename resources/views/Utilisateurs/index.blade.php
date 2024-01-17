@extends("layouts.master")

@section("content")

<div class="my-2 p-2 bg-body rounded shadow-sm">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des utilisateurs</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input type="text" class="form-control" id="search_user" onkeyup="searchUserByName()" placeholder="Rechercher par prénom">
                  <div class="input-group-append">
                    <button class="btn btn-default" type="button">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>

        </div>
        </div>
    {{ $users->links() }}

<!-- Affichage du message de succès ici -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="pull-right">
    <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal" title="Ajouter un matériel">
        <i class="fas fa-plus-circle"></i> Ajouter
    </a>
</div>

<br>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form style="width: 65%" method="POST" action="{{ route('utilisateurs.store') }}">
                @csrf

                <div class="modal-body" id="mediumBody">
                    <div class="row">
                        <div class="col-md-6">

                                <label for="name">Nom :</label>
                                <input type="text" class="form-control" name="name">

                        </div>
                        <div class="col-md-6">

                                <label for="prenom">Prenom :</label>
                                <input type="text" class="form-control" name="prenom">

                        </div>


                        <div class="col-md-6">

                                <label for="adresse">Adresse :</label>
                                <input type="text" class="form-control" name="adresse">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Telephone :</label>
                                <input type="text" class="form-control" name="telephone">
                            </div>
                        </div>


                        <div class="col-md-6">

                                <label for="email">Email :</label>
                                <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-md-6">

                                <label for="password">Mot de passe :</label>
                                <input type="text" class="form-control" name="password">
                            </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="structures_id">Structures :</label>
                                <select id="structures_id" name="structures_id" class="form-control">
                                    <option>------------</option>
                                    @foreach ($structures as $structure)
                                    <option value="{{ $structure->id }}">{{ $structure->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roles_id">Rôle :</label>
                                <select id="roles_id" name="roles_id" class="form-control">
                                    <option>------------</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->type_utilisateur }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>

                <div class="modal-footer text-right"> <!-- Aligne le footer à droite -->
                    <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Ajouter</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


        <div class="card-body table-responsive p-2">
            <table class="table table-bordered text-nowrap " id="user_table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Structures</th>
                    <th scope="col">Rôles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->structures->nom }}</td>
                    <td>{{ $user->roles->type_utilisateur}}</td>

                    <td>
                            <a href="{{ route('utilisateurs.edit', ['user' => $user->id]) }}"
                                class="btn btn-info me-2"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" onclick="event.preventDefault(); showConfirmationModal({{$user->id}});"
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
                            Voulez-vous vraiment supprimer cet utilisateur?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form id="form-{{$user->id}}" method="POST" action="{{ route('utilisateurs.delete', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
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
    </div>
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
          var formData = $(this).serializeArray();
          $.ajax({
              type: "POST",
              url: "{{ route('utilisateurs.store') }}",
              data: formData,
              success: function (data) {
                  console.log(data);
                  if (data.success) {
                      alert('Demande créer avec succès.');
                      window.location.reload();
                  } else {
                      alert('Erreur lors de la creation de la demande: ' + data.error);
                  }
              }

          });
      });
  });
</script>

<script>
    function searchUserByName() {
      var input, filter, table, tr, tdName, tdFirstName, i, txtValueName, txtValueFirstName;
      input = document.getElementById("search_user");
      filter = input.value.toUpperCase();
      table = document.getElementById("user_table");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        tdName = tr[i].getElementsByTagName("td")[1]; // Index de la colonne du nom
        tdFirstName = tr[i].getElementsByTagName("td")[2]; // Index de la colonne du prénom

        if (tdName || tdFirstName) {
          txtValueName = tdName.textContent || tdName.innerText;
          txtValueFirstName = tdFirstName.textContent || tdFirstName.innerText;

          if (txtValueName.toUpperCase().indexOf(filter) > -1 || txtValueFirstName.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

