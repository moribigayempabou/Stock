<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Projet de gestion de stock</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Script -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-alpha2/css/all.min.css" rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{asset('offcanvas-navbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery/datatables/min/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" style="font-size: 20px;">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" style="font-size: 20px;">
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}" style="font-size: 20px;">
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <style>
        /* Ajoutez votre CSS personnalisé ici */

        body {
            background-color: #595289;

            /* Style pour le pied de page (footer) */
        }

        /* Style pour le pied de page (footer) */


        /* CSS personnalisé pour positionner le bouton de déconnexion en bas de la page */
.logout-button {
    position: absolute;
    bottom: 0;
    left: 0;
    margin: 10px; /* Marge pour espacement du bord inférieur et du bord gauche */
}
/* CSS personnalisé pour la couleur de la barre de navigation */
.sidebar-custom-color {
    background-color: rgb(14, 146, 21); /* Vous pouvez ajuster cette couleur selon vos préférences */
    /* Autres styles CSS au besoin */
}

        .aside a div {
            background-color:rgb(20, 20, 161)
        }
        /* Style pour le contenu principal (pour qu'il prenne tout l'espace disponible) */
        .content-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Style pour le contenu réel de la page */
        .content {
            flex: 1;
        }

        .close-button-container {
            margin-left: auto;
        }


    </style>
</head>


<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo.png"  height="100" width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{route('home')}}">Acceuil</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto"> <!-- Utilisez ml-auto pour aligner à droite -->
                <li class="nav-item">
                    <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                        <div class="image">
                            <img src="dist/img/logo.png"   height="300" width="300">
                        </div>
                        <div class="info">
                            @if(Auth::check())
                            <div class="d-block" style="font-size: 20px; color:#4716c4">{{ Auth::user()->roles->type_utilisateur }}-{{ Auth::user()->structures->nom }} </div>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside  class="main-sidebar sidebar-custom-color elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="dist/img/logo.png"  height="40" width="40" >
                <span class="brand-text font-weight-light" style="font-size: 15px; color:white">GESTION DE STOCK</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    TABLEAU DE BORD
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="color: white">
                                <i class="nav-icon fas fa-tools"></i> <!-- Utiliser l'icône de gestion de matériels ici -->
                                <p>
                                    GESTION MATERIELS
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"">
                                    <a href="{{route('materiels')}}" class="nav-link" style="color: white">
                                        <i class="fas fa-cube nav-icon"></i> <!-- Utiliser l'icône de matériels non affectés ici -->
                                        <p>Matériels</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('acquisitions')}}" class="nav-link" style="color: white">
                                        <i class="fas fa-shopping-cart nav-icon"></i> <!-- Utiliser l'icône des acquisitions ici -->
                                        <p>Acquisitions</p>
                                    </a>
                                </li>
                                <li class="nav nav-item">
                                    <a href="{{route('affectations')}}" class="nav-link" style="color: white">
                                        <i class="fas fa-exchange-alt nav-icon"></i> <!-- Utiliser l'icône des affectations ici -->
                                        <p>Materiels non affectés</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('affectes')}}" style="color: white">
                                        <i class="fas fa-exchange-alt nav-icon"></i> <!-- Utiliser l'icône des utilisateurs ici -->
                                        <p>Matériels affectés</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('demande')}}" class="nav-link" style="color: white">
                                        <i class="fas fa-sticky-note"></i> <!-- Utiliser l'icône d'une demande ici -->
                                        <p>Demande</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" style="color: white">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    GESTION DES ETATS
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="color: white">
                                        <i class="fas fa-file-alt nav-icon"></i> <!-- Utiliser l'icône de rapport ici -->
                                        <p>Rapport</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="color: white">
                                        <i class="fas fa-file-alt nav-icon"></i> <!-- Utiliser l'icône de rapport ici -->
                                        <p>Inventaire</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('statistiques')}}" class="nav-link" style="color: white">
                                        <i class="fas fa-chart-bar nav-icon"></i> <!-- Utiliser l'icône de statistiques ici -->
                                        <p>Statistiques</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{--<li class="nav-item">
                            <a href="#" class="nav-link" style="color: white">
                                <i class="nav-icon fas fa-cogs"></i> <!-- Utiliser l'icône des paramètres ici -->
                                <p>
                                    AUTRES
                                </p>
                            </a>

                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="{{route('stock')}}" class="nav-link" style="color: white">
                                        <i class="fas fa-sticky-note"></i> <!-- Utiliser l'icône d'une demande ici -->
                                        <p>Stock disponible</p>
                                    </a>
                                </li>
                            </ul>
                        </li>--}}

    <!-- Affichez ici la fonctionnalité réservée aux administrateurs -->


                        <li class="nav-item">
                            <a href="#" class="nav-link" style="color: white">
                                <i class="nav-icon fas fa-users"></i> <!-- Utiliser l'icône de gestion des utilisateurs ici -->
                                <p>
                                    GESTION UTILISATEURS
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('utilisateurs')}}" style="color: white">
                                        <i class="fas fa-users nav-icon"></i> <!-- Utiliser l'icône des utilisateurs ici -->
                                        <p>Utilisateurs</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->
            <div class="logout-button">

                <div class="info">
                    @if(Auth::check())
                    <div class="d-block" style="font-size: 20px; color:#d4d4da">{{ Auth::user()->name }} {{ Auth::user()->prenom }} en ligne </div>
                    @endif
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Déconnexion
                </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>

        </aside>

        <!-- Main content -->
        <div class="content-wrapper">

                <main class="container-fluid">
                    @yield("content")
                </main>

        </div>



    </div>
    <!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"> </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> </script>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="{{ asset('path/to/chart.min.js') }}"></script>


    <!-- PAGE PLUGINS -->
    <!-- SparkLine -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- PAGE SCRIPTS -->
    <script src="{{ asset('js/node_modules/chart.js/dist/chart.min.js') }}"></script>

    <!-- Script -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myDataTable').DataTable();
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
