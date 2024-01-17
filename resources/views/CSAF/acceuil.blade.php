@extends("layouts.masterCsaf")

@section("content")
    @csrf

    <div class="row">
     <!-- Nouvelle notification à droite -->
     <div class="col-lg-12 col-12">
        <h2 style="color: #3498db;">Bienvenue  {{ Auth::user()->prenom }} ! 👋</h2><br>
        <div class="inner" style="float: right;">
            <a href="{{ route('CSAF/notification') }}" class="nav-link">
                <span id="notificationIndicator" style="color: red;">&#x1F514;</span>
                <p>Nouvelles notifications (0) </p>
            </a>
            <!-- Affichez le nombre de notifications non lues ici -->
            <span id="unreadNotificationsCount"></span>
        </div>
    </div><br><br><br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Vous pouvez éditer une demande à partir d'ici en cliquant sur ce bouton <i class="fas fa-arrow-circle-right"></i></h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <!-- Ajoutez des champs de date de début et de fin ici -->
                        <div>
                            <a href="{{ route('CSAF/demande.csafcreate') }}"class="btn btn-primary"><i class="fas fa-plus-circle"></i>Editer demande</a>
                        </div>

                    </div>

                  </div>
                </div>
              </div>

        </div>

        <div class="col-lg-6 col-10">
            <!-- Section du small-box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <p>Gérer matériels</p>
                </div>
                <a href="{{ route('CSAF/affectes') }}" class="small-box-footer"> + Plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-6 col-10">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <p>Gérer demande</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('CSAF/demande')}}" class="small-box-footer"> + Plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <!-- Reste du contenu -->
        <!-- ... -->

    </div>
    <!-- /.row -->
@endsection

<script>
    // Script pour mettre à jour le nombre de notifications non lues

    function updateUnreadNotificationsCount() {
        // Faites une requête Ajax pour obtenir le nombre de notifications non lues depuis le serveur
        // Assurez-vous que la route et le contrôleur appropriés sont en place pour cela

        // Exemple de requête Ajax (à adapter à votre application) :
        $.ajax({
            url: '{{ route('notifications.unread.count') }}', // Assurez-vous que cette route existe
            type: 'GET',
            success: function (data) {
                // Mettez à jour le contenu du span avec le nombre de notifications non lues
                $('#unreadNotificationsCount').text(data.count);
            },
        });
    }

    // Appelez la fonction au chargement de la page
    $(document).ready(function () {
        updateUnreadNotificationsCount();
    });

    // Vous pouvez également appeler cette fonction lorsque vous marquez une notification comme lue.
</script>
