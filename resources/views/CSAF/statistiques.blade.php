
{{--@extends("layouts.master")

@section("content")
<div class="my-2 p-2 bg-body rounded shadow-sm">

    <div>
        <h3>Statistiques des Matériels</h3>

    </div>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

    <div style="width: 80%; margin: auto;">
        <canvas id="acquisitionAffectationChart" width="800" height="400"></canvas>
    </div>

    <script>


        var months = @json($months);
        var acquisitions = @json($acquisitions);
        var affectations = @json($affectations);

        var ctx = document.getElementById('acquisitionAffectationChart').getContext('2d');
        var acquisitionAffectationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Utilisez les mois comme étiquettes de l'axe x
                datasets: [{
                    label: 'Acquisitions',
                    data: acquisitions,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Affectations',
                    data: affectations,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endsection--}}


    @extends("layouts.masterCsaf")

@section("content")
<div class="my-2 p-2 bg-body rounded shadow-sm">

    <div class="d-flex justify-content-left mb-2">
        <a href="{{ route('CSAF/acquisitions') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Retour</a>
    </div><br>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Statistiques des matériels acquis ce mois-ci</h3>

            </div>
            <div>
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
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

    <!-- Insérez ici le code pour afficher les statistiques des matériels acquis dans le mois -->
    <div class="card">
        <div class="card-body">
            <!-- Insérez ici vos graphiques ou données statistiques -->
        </div>
    </div>


<script>
    // Récupérez les données de votre contrôleur (données passées dans la vue)
    var donneesStatistiques = @json($donneesStatistiques);

    // Extraire les mois et les quantités de données
    var mois = [];
    var quantites = [];

    donneesStatistiques.forEach(function(donnee) {
        mois.push(donnee.mois);
        quantites.push(donnee.quantite);
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: mois,
            datasets: [{
                label: 'Matériels acquis ce mois-ci',

                data: quantites,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de remplissage du graphique
                borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la bordure du graphique
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Quantité'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Mois'
                    }
                }
            }
        }
    });
</script>
@endsection

