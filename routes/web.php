<?php
use App\Http\Controllers\AcquisitionController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetournerMaterielController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/users', [UtilisateurController::class, "index"])->name('utilisateurs');
    Route::post('/users', [UtilisateurController::class, "store"])->name('utilisateurs.store');
    Route::get('/users/{user}/edit', [UtilisateurController::class, "edit"])->name('utilisateurs.edit');
    Route::put('/users/{user}', [UtilisateurController::class, "update"])->name('utilisateurs.update');
    Route::delete('/users/{user}', [UtilisateurController::class, "delete"])->name('utilisateurs.delete');
    // Autres routes pour les utilisateurs connectés ici...


    Route::get('/acquisitions/DAF', [AcquisitionController::class, "indexDAF"])->name('acquisitions/DAF');
    Route::get('/acquisitions', [AcquisitionController::class, "index"])->name('acquisitions');
    Route::post('/acquisitions', [AcquisitionController::class, "store"])->name('acquisitions.store');
    Route::get('/acquisitions/{acquisition}/edit', [AcquisitionController::class, "edit"])->name('acquisitions.edit');
    Route::put('/acquisitions/{acquisition}', [AcquisitionController::class, "update"])->name('acquisitions.update');
    Route::put('/acquisitions/create', [AcquisitionController::class, "create"])->name('acquisitions.create');
    Route::delete('/acquisitions/{acquisition}', [AcquisitionController::class, "delete"])->name('acquisitions.delete');


    //afficher les details d'une acquisition
    Route::get('/acquisitions/{id}', [AcquisitionController::class, 'show'])->name('acquisitions.show');

    Route::get('/stock', [StockController::class, "index"])->name('stock');
    Route::get('/materiels', [MaterielController::class, "index"])->name('materiels');
    Route::post('/materiels', [MaterielController::class, "store"])->name('materiels.store');
    Route::get('/materiels/{materiel}/edit', [MaterielController::class, "edit"])->name('materiels.edit');
    Route::get('/materiels/{materiel}/edite', [MaterielController::class, "edite"])->name('materiels.edite');
    Route::put('/materiels/{materiel}', [MaterielController::class, "update"])->name('materiels.update');
    Route::get('/materiels/{id}', [MaterielController::class, 'show'])->name('materiels.show');
    Route::delete('/materiels/{materiel}', [MaterielController::class, "delete"])->name('materiels.delete');

    //Route::post('/materiels/{id}/affecter', [MaterielController::class, 'affecter'])->name('materiels.affecter');
    Route::post('/affectations/{affectation}/affecter', [AffectationController::class, 'affecter'])->name('affectations.affecter');

    // Route pour afficher la liste des affectations
    Route::get('/affectations', [AffectationController::class, 'index'])->name('affectations');
    Route::get('/affectations/affectes', [AffectationController::class, 'affectes'])->name('affectes');
    Route::get('/affectations/{materiel}/edite', [AffectationController::class, 'edite'])->name('Affectations.edite');
    // Route pour enregistrer une nouvelle affectation
    Route::post('/affectations', [AffectationController::class, 'store'])->name('affectations.store');
    // Route pour afficher le formulaire d'édition d'une affectation spécifique
    Route::get('/affectations/{affectation}/edit', [AffectationController::class, 'edit'])->name('affectations.edit');
    Route::get('/affectations/{affectation}/edite', [AffectationController::class, 'edite'])->name('affectations.edite');
    // Route pour mettre à jour une affectation spécifique
    Route::put('/affectations/{affectation}', [AffectationController::class, 'update'])->name('affectations.update');
    // Route pour afficher les détails d'une affectation spécifique
    Route::get('/affectations/{materiel}', [AffectationController::class, 'show'])->name('affectations.show');
    // Route pour supprimer une affectation spécifique
    Route::delete('/affectations/{affectation}', [AffectationController::class, 'delete'])->name('affectations.delete');
    Route::get('/get-materiel-affecte/{id}', [AffectationController::class, 'getMaterielAffecte'])->name('retouner');

    Route::get('/saisir-quantite-retournee', [RetournerMaterielController::class, 'showForm'])->name('saisir-quantite-retournee');
    Route::post('/retourner-materiel', [RetournerMaterielController::class, 'retournerMateriel'])->name('retourner-materiel');
    Route::get('/affectations/CSAF', [AffectationController::class, 'indexCSAF'])->name('affectations/CSAF');
    //statistiques
    Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques');
    Route::get('/statistiques/{id}', [StatistiqueController::class, 'show'])->name('statistiques.show');
    //les demandes
    Route::get('/demande/show/{id}', [DemandeController::class, 'show'])->name('demande.show');
    Route::get('/demande', [DemandeController::class, 'index'])->name('demande');
    Route::get('/demande/create', [DemandeController::class, 'create'])->name('demande.create');
    Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');
    Route::get('/demande/{demande}/edit', [DemandeController::class, 'edit'])->name('demande.edit');
    Route::delete('/demande/{demande}', [DemandeController::class, 'delete'])->name('demande.delete');
    // Route::get('/demande/{demande}', [DemandeController::class,'update'])->name('demande.update');
    Route::get('/demande/{id}', [DemandeController::class, 'show'])->name('demandes.show');
    //Route::get('demande/{id}', [DemandeController::class,'show'])->name('demande.show')->middleware('guest');
    Route::post('/demande/{id}', [DemandeController::class, 'update'])->name('demande.update');
    Route::put('/demande/{id}', [DemandeController::class, 'update'])->name('demandes.update');


    Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('auth.register');
    Route::post('/register', [RegisteredUserController::class, 'register'])->name('register');

    /*Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);*/

});
//pour le DAF
Route::middleware('role:DAF')->group(function () {
    // Routes pour le DAF
    Route::get('/DAF/acceuil', [HomeController::class, "dafindex"])->name('DAF/acceuil');
    Route::get('/DAF/affectations', [AffectationController::class, 'dafindex'])->name('DAF/affectations');
    Route::get('/DAF/affectations/affectes', [AffectationController::class, 'dafaffectes'])->name('DAF/affectes');
    Route::get('/DAF/affectations/{materiel}/edite', [AffectationController::class, 'dafedite'])->name('DAF/Affectations.edite');
    // Route pour enregistrer une nouvelle affectation
    Route::post('/DAF/affectations', [AffectationController::class, 'dafstore'])->name('DAF/affectations.store');
    // Route pour afficher le formulaire d'édition d'une affectation spécifique
    Route::get('/DAF/affectations/{affectation}/edit', [AffectationController::class, 'dafedit'])->name('DAF/affectations.edit');
    Route::get('/DAF/affectations/{affectation}/edite', [AffectationController::class, 'dafedite'])->name('DAF/affectations.edite');
    // Route pour mettre à jour une affectation spécifique
    Route::put('/DAF/affectations/{affectation}', [AffectationController::class, 'dafupdate'])->name('DAF/affectations.update');
    // Route pour afficher les détails d'une affectation spécifique
    Route::get('/DAF/affectations/{materiel}', [AffectationController::class, 'dafshow'])->name('DAF/affectations.show');
    // Route pour supprimer une affectation spécifique
    Route::delete('/DAF/affectations/{affectation}', [AffectationController::class, 'dafdelete'])->name('DAF/affectations.delete');

    Route::get('/DAF/stock', [StockController::class, "dafindex"])->name('DAF/stock');
    Route::get('/DAF/acquisitions', [AcquisitionController::class, "dafindex"])->name('DAF/acquisitions');
    Route::post('/DAF/acquisitions', [AcquisitionController::class, "dafstore"])->name('DAF/acquisitions.store');
    Route::get('/DAF/acquisitions/{acquisition}/edit', [AcquisitionController::class, "dafedit"])->name('DAF/acquisitions.edit');
    Route::put('/DAF/acquisitions/{acquisition}', [AcquisitionController::class, "dafupdate"])->name('DAF/acquisitions.update');
    Route::put('/DAF/acquisitions/create', [AcquisitionController::class, "dafcreate"])->name('DAF/acquisitions.create');
    Route::delete('/DAF/acquisitions/{acquisition}', [AcquisitionController::class, "dafdelete"])->name('DAF/acquisitions.delete');
    //afficher les details d'une acquisition
    Route::get('/DAF/acquisitions/{id}', [AcquisitionController::class, 'dafshow'])->name('DAF/acquisitions.show');

    Route::get('/DAF/stock', [StockController::class, "dafindex"])->name('DAF/stock');
    Route::get('/DAF/materiels', [MaterielController::class, "dafindex"])->name('DAF/materiels');
    Route::post('/DAF/materiels', [MaterielController::class, "dafstore"])->name('DAF/materiels.store');
    Route::get('/DAF/materiels/{materiel}/edit', [MaterielController::class, "dafedit"])->name('DAF/materiels.edit');
    Route::get('/DAF/materiels/{materiel}/edite', [MaterielController::class, "dafedite"])->name('DAF/materiels.edite');
    Route::put('/DAF/materiels/{materiel}', [MaterielController::class, "dafupdate"])->name('DAF/materiels.update');
    Route::get('/DAF/materiels/{id}', [MaterielController::class, 'dafshow'])->name('DAF/materiels.show');
    Route::delete('/DAF/materiels/{materiel}', [MaterielController::class, "dafdelete"])->name('DAF/materiels.delete');
    Route::get('/DAF/get-materiel-affecte/{id}', [AffectationController::class, 'getMaterielAffecte'])->name('DAF/affectation.retouner');
    //Route::post('/materiels/{id}/affecter', [MaterielController::class, 'affecter'])->name('materiels.affecter');
    Route::post('/DAF/affectations/{affectation}/affecter', [AffectationController::class, 'dafaffecter'])->name('DAF/affectations.affecter');

    //statistiques
    Route::get('/DAF/statistiques', [StatistiqueController::class, 'dafindex'])->name('DAF/statistiques');
    Route::get('/DAF/statistiques/{id}', [StatistiqueController::class, 'dafshow'])->name('DAF/statistiques.show');
    //les demandes
    Route::get('/DAF/demande/show/{id}', [DemandeController::class, 'dafshow'])->name('DAF/demande.show');
    Route::get('/DAF/demande/{id}', [DemandeController::class, 'dafshow'])->name('DAF/demande.dafshow');
    Route::get('/DAF/demande', [DemandeController::class, 'dafindex'])->name('DAF/demande');

    Route::get('/DAF/demande/create', [DemandeController::class, 'dafcreate'])->name('DAF/demande.dafcreate');

    Route::post('/DAF/demande', [DemandeController::class, 'dafstore'])->name('DAF/demande.dafstore');
    Route::get('/DAF/demande/{demande}/edit', [DemandeController::class, 'dafedit'])->name('DAF/demande.edit');
    Route::delete('/DAF/demande/{demande}', [DemandeController::class, 'dafdelete'])->name('DAF/demande.delete');
    // Route::get('/DAF/demande/{demande}', [DemandeController::class, 'dafupdate'])->name('DAF/demande.update');
    Route::post('/DAF/demande/{id}', [DemandeController::class, 'dafupdate'])->name('DAF/demande.dafupdate');
    Route::put('/DAF/demande/{id}', [DemandeController::class, 'dafupdate'])->name('DAF/demande.update');

    // Route::put('/DAF/demande/{id}', [DemandeController::class, 'update'])->name('demandes.update');





    /*Route::get('/DAF/users', [UtilisateurController::class, "dafindex"])->name('DAF/utilisateurs');
      Route::post('/DAF/users', [UtilisateurController::class, "dafstore"])->name('DAF/utilisateurs.store');
      Route::get('/DAF/users/{user}/edit', [UtilisateurController::class, "edit"])->name('DAF/utilisateurs.edit');
      Route::put('/DAF/users/{user}', [UtilisateurController::class, "update"])->name('DAF/utilisateurs.update');
      Route::delete('/DAF/users/{user}', [UtilisateurController::class, "delete"])->name('DAF/utilisateurs.delete');
*/
});

Route::middleware(['role:CSAF'])->group(function () {
    Route::get('/CSAF/acceuil', [HomeController::class, "csafindex"])->name('CSAF/acceuil');
    Route::get('/CSAF/affectations', [AffectationController::class, 'csafindex'])->name('CSAF/affectations');
    Route::get('/CSAF/affectations/affectes', [AffectationController::class, 'csafaffectes'])->name('CSAF/affectes');
    Route::get('/CSAF/affectations/{materiel}/edite', [AffectationController::class, 'csafedite'])->name('CSAF/Affectations.edite');
    // Route pour enregistrer une nouvelle affectation
    Route::post('/CSAF/affectations', [AffectationController::class, 'csafstore'])->name('CSAF/affectations.store');
    // Route pour afficher le formulaire d'édition d'une affectation spécifique
    Route::get('/CSAF/affectations/{affectation}/edit', [AffectationController::class, 'csafedit'])->name('CSAF/affectations.edit');
    Route::get('/CSAF/affectations/{affectation}/edite', [AffectationController::class, 'csafedite'])->name('CSAF/affectations.edite');
    // Route pour mettre à jour une affectation spécifique
    Route::put('/CSAF/affectations/{affectation}', [AffectationController::class, 'csafupdate'])->name('CSAF/affectations.update');
    // Route pour afficher les détails d'une affectation spécifique
    Route::get('/CSAF/affectations/{affectation}', [AffectationController::class, 'show'])->name('CSAF/affectations.show');
    // Route pour supprimer une affectation spécifique
    Route::delete('/CSAF/affectations/{affectation}', [AffectationController::class, 'csafdelete'])->name('CSAF/affectations.delete');
    Route::get('/CSAF/get-materiel-affecte/{id}', [AffectationController::class, 'csafgetMaterielAffecte'])->name('CSAF/retouner');
    Route::post('/CSAF/affectations/{affectation}/affecter', [AffectationController::class, 'csafaffecter'])->name('CSAF/affectations.affecter');
    Route::get('/CSAF/saisir-quantite-retournee', [RetournerMaterielController::class, 'csafshowForm'])->name('CSAF/saisir-quantite-retournee');
    Route::post('/CSAF/retourner-materiel', [RetournerMaterielController::class, 'csafretournerMateriel'])->name('CSAF/retourner-materiel');
    Route::get('/CSAF/notifications', [NotificationController::class, 'csafindex'])->name('CSAF/notification');
    Route::get('/notifications/unread/count', [NotificationController::class, 'unreadCount'])->name('notifications.unread.count');
    Route::get('/CSAF/statistiques', [StatistiqueController::class, 'index'])->name('CSAF/statistiques');
    Route::get('/CSAF/statistiques/{id}', [StatistiqueController::class, 'show'])->name('CSAF/statistiques.show');
    //les demandes
    // Routes pour les demandes CSAF
    Route::get('/CSAF/demande', [DemandeController::class, 'csafindex'])->name('CSAF/demande');
    Route::get('/CSAF/demande/create', [DemandeController::class, 'csafcreate'])->name('CSAF/demande.csafcreate');
    Route::post('/CSAF/demande', [DemandeController::class, 'csafstore'])->name('CSAF/demande.csafstore');
    Route::get('/CSAF/demande/{demande}/edit', [DemandeController::class, 'csafedit'])->name('CSAF/demande.edit');
    Route::delete('/CSAF/demande/{demande}', [DemandeController::class, 'csafdelete'])->name('CSAF/demande.delete');
    Route::get('/CSAF/demande/{demande}', [DemandeController::class, 'csafupdate'])->name('CSAF/demande.update');

});
/* Route::get('login', [LoginController::class, 'show'])->name('login');
 Route::get('login', [LoginController::class, 'login']);*/


require __DIR__ . '/auth.php';
