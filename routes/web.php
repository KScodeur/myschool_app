<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route pour la page d'authentification
Route::get('/',[AuthController::class,'login'])->name('login'); 

// pour la page d'enregistrer un admin
Route::get('/registration',[AuthController::class,'registration'])->name('authentificate');

//pour enregistrer un admin
Route::post('/register',[AuthController::class,'registerUser'])->name('registerUser');

//connection
Route::post('/registrer_user',[AuthController::class,'loginUser'])->name('login_user');

// pour se déconnecter
Route::get('/logout',[AuthController::class,'logout'])->name('logout');




// route pour le dashoard d'acceuil
Route::get('/eleve',[AuthController::class,'index'])->name('dashboard');

// route de l'inscription
Route::get('eleve/create',[EleveController::class,'create'])->name('createEleve');

// enregistrer un eleve
Route::post('eleve/create',[EleveController::class,'store'])->name('storeEleve');

// afficher tout les élèves
Route::get('create/list',[EleveController::class,'getAll'])->name('readEleve');
//pour rechercher les eleves
Route::get('/search',[EleveController::class,'search'])->name('eleves.search');
// pour le bouton editer
Route::get('/edit/{id}',[EleveController::class,'edit'])->name('edit');
// l'action du boutton editer
Route::put('update-data/{id}',[EleveController::class,'update'])->name('update');

// pour supprimer un élève
Route::get('delete/{id}',[EleveController::class,'delete']);



// Classe

// enregistrer une classe
Route::post('classe/create',[ClasseController::class,'store'])->name('storeClasse');

// pour afficher les classes et scolarité
Route::get('classes/scolarite',[ClasseController::class,'index'])->name('classes');

// route pour les eleves par classe
Route::get('list/classes',[ClasseController::class,'getByClass'])->name('listByClass');

// pour supprimer une classe
Route::get('deleteClasse/{id}',[ClasseController::class,'deleteClasse'])->name('deleteClasse');

// pour editer une classe
Route::get('/editclasse/{id}',[ClasseController::class,'edit'])->name('editClasse');

Route::put('update-classe/{id}',[ClasseController::class,'update'])->name('updateClasse');



// Professeur
// page d'inscription du prof
Route::get('prof/create',[ProfController::class,'create'])->name('createProf');
//la liste des professeurs 
Route::get('prof/list',[ProfController::class,'getAll'])->name('readProf');
//pour rechercher un professeur
Route::get('prof/search',[ProfController::class,'search'])->name('prof.search');

// enregistrer un professeur
Route::post('prof/create',[ProfController::class,'store'])->name('storeProf');

// pour editer un professeur
Route::get('/editprof/{id}',[ProfController::class,'edit'])->name('editProf');
//pour mettre a jour
Route::put('update-prof/{id}',[ProfController::class,'update'])->name('updateProf');
//pour supprimer un prof
Route::get('deleteprof/{id}',[ProfController::class,'delete'])->name('deleteProf');


// matière
Route::get('/matieres',[MatiereController::class,'read'])->name('matieres');
// enregistrer une matière
Route::post('matiere/create',[MatiereController::class,'store'])->name('storeMatiere');
// pour editer une matiere
Route::get('editmatiere/{id}',[MatiereController::class,'edit'])->name('editMatiere');
//pour mettre a jour
Route::put('update-matiere/{id}',[MatiereController::class,'update'])->name('updateMatiere');
// pour supprimer une matiere
Route::get('deleteMatiere/{id}',[MatiereController::class,'delete'])->name('deleteMatiere');