


@extends("layouts.masterDaf")


@section("content")


<div class="my-4 p-4 bg-body rounded shadow-sm">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Acquisitions</h3>
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
            {{ $acquisitions->links() }}
        <div class="pull-right">
            <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                data-attr="{{ route('DAF/acquisitions.create') }}" >Ajouter <i class="fas fa-plus-circle"></i>
            </a>
        </div><br><br>

        <table id="materiels_table" class="table table-bordered">
            <thead style="background-color: rgb(97, 236, 252) ; ">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Type</th>
                    <th scope="col">Sources</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($acquisitions as $acquisition)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $acquisition->type_acquisitions->libelle }}</td>
                    <td>{{ $acquisition->source }}</td>
                    <td>{{ $acquisition->description }}</td>
                    <td>{{ $acquisition->created_at }}</td>
                    <td>
                        <a href="{{ route('DAF/acquisitions.show', ['id' => $acquisition->id]) }}" class="btn btn-primary me-2">
                           Details <i class="far fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="POST" action="{{ route('DAF/acquisitions.store') }}">
                    @csrf
                    <div class="modal-body" id="mediumBody">


                        <div class="mt-4">
                            <div class="form-group">
                                <label for="type_acquisitions_id">Type d'acquisition :</label>
                                <select name="type_acquisitions_id" class="form-control">
                                    @foreach ($type_acquisitions as $type_acquisition)
                                        <option value="{{ $type_acquisition->id }}">{{ $type_acquisition->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="source">Sources :</label>
                                <select name="source" class="form-control" name="source" id="source">
                                    <option disabled selected>------------</option>
                                        <option> Budget</option>
                                        <option> Partenaire Technique et Financier</option>
                                        <option> Autres</option>

                                </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <input type="text"  name="description" id="description" class="form-control">
                    </div>
                            </div>
                            <br>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Créer</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





<script>
    $('#mediumButton').on('click', function() {
        var $type_d_acquisition_id = $('#type_d_acquisition_id').val();
        var $source = $('#source').val();
        var $created_at = $('#created_at').val();
        $.ajax({
            url: "/acquisitions",
            type: "POST",
            success: function(session) {
                var $obj = $.parseJSON(session);
                if ($obj.success === false) {
                    $('.error').show();
                    $('.success').hide();
                    $('.error').html($obj.error);
                } else {
                    $('.error').hide();
                    $('.success').show();
                    $('.success').html($obj.success);
                }
            }
        });
    });


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
@endsection
