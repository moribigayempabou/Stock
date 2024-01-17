@extends("layouts.masterDaf")

@section("content")
@csrf
<div class="row">
    <h2 style="color: #3498db;">Bienvenue  {{ Auth::user()->prenom }} ! 👋</h2><br>
<br><br><br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Vous pouvez éditer une demande à partir d'ici en cliquant sur ce bouton <i class="fas fa-arrow-circle-right"></i></h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <!-- Ajoutez des champs de date de début et de fin ici -->
                    <div>
                        <a href="{{ route('DAF/demande.dafcreate') }}"class="btn btn-primary"><i class="fas fa-plus-circle"></i>Editer demande</a>
                    </div>

                </div>

              </div>
            </div>
          </div>

    </div>

<br><br><br><br><br><br>
    <!-- Small boxes (Stat box) -->
    <div class="col-lg-4 col-8">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">

                <p>Demande en cours</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('DAF/demande')}}" class="small-box-footer">+ Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-8">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">

                <p>Gestion des acquisitions</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('DAF/materiels')}}" class="small-box-footer">+ Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-4 col-8">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">

                <p>Gestion des affectations</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('DAF/affectes')}}" class="small-box-footer"> + Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
@endsection
