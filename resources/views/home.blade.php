@extends("layouts.master")

@section("content")
@csrf
<div></div>
<div></div><br>
<div class="row">
    <h2 style="color: #3498db;">Bienvenue  {{ Auth::user()->prenom }} ! 👋</h2><br>
<br><br><br><br><br>
    <!-- Small boxes (Stat box) -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">

                <p>Demande en cours</p>
            </div>
            <div class="icon">
                <i class="fas fa-box"></i>
            </div>
            <a href="{{route('demande')}}" class="small-box-footer">+ Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">

                <p>Gestion de materiels acquis</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('materiels')}}" class="small-box-footer">+ Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">

                <p>Gestion utilisateurs</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('utilisateurs')}}" class="small-box-footer"> + Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">

                <p>Gestion de materiels affectés</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('affectes')}}" class="small-box-footer"> + Plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
@endsection
