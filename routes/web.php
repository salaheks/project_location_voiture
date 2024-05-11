<?php

use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\AssureurController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CentreVisiteController;
use App\Http\Controllers\CirculationAutorisationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConvoyageController;
use App\Http\Controllers\CreditPaiementController;
use App\Http\Controllers\DistributionChainController;
use App\Http\Controllers\OptionSupplimentaireController;
use App\Http\Controllers\PanneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VidangeController;
use App\Http\Controllers\VignettesController;
use App\Http\Controllers\VisiteTechniqueController;
use App\Http\Controllers\VoitureHistoriqueController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pageTitle = 'Dashboard';
    return view('dashboard',compact('pageTitle'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/password', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Type Voiture
    Route::get('/types', [TypeController::class, 'index'])->name('type.index');
    Route::get('/types/add', [TypeController::class, 'add'])->name('type.add');
    Route::post('/types/store', [TypeController::class, 'store'])->name('type.store');
    Route::get('/types/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
    Route::put('/types/update/{type}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('/types/delete/{type}', [TypeController::class, 'destroy'])->name('type.destroy');
    // Get Models (Type Voiture)
    Route::get('/get-models', function (Request $request) {
        $marque = $request->input('marque');
        $models = models($marque); // Call your models function with the marque name
        return response()->json($models);
    });
    // Voiture
    Route::get('/voiture', [VoitureController::class, 'index'])->name('voiture.index');
    Route::get('/voiture/add', [VoitureController::class, 'add'])->name('voiture.add');
    Route::post('/voiture/store', [VoitureController::class, 'store'])->name('voiture.store');
    Route::get('/voiture/{voiture}/edit', [VoitureController::class, 'edit'])->name('voiture.edit');
    Route::put('/voiture/update/{voiture}', [VoitureController::class, 'update'])->name('voiture.update');
    Route::delete('/voiture/delete/{voiture}', [VoitureController::class, 'destroy'])->name('voiture.destroy');
    Route::get('/voiture/payments/{voiture}', [VoitureController::class, 'showPayments'])->name('voiture.payments');
    Route::get('/voiture/visitetechniques/{voiture}', [VoitureController::class, 'showTechnicalVisits'])->name('voiture.visitetechniques');
    Route::get('/voiture/historique/{voiture}', [VoitureController::class, 'showHistory'])->name('voiture.historiques');
    Route::get('/voiture/assurance/{voiture}', [VoitureController::class, 'showAssurances'])->name('voiture.assurances');
    Route::get('/voiture/vignette/{voiture}', [VoitureController::class, 'showVignettes'])->name('voiture.vignette');
    Route::get('/voiture/vidange/{voiture}', [VoitureController::class, 'showVidanges'])->name('voiture.vidanges');
    Route::get('/voiture/available-voitures',[VoitureController::class, 'availableCars']);
    Route::get('voiture/{voiture}', [VoitureController::class, 'show']);
    //Paiments Credit
    Route::get('/paiement/{paiement}', [CreditPaiementController::class, 'edit'])->name('paiement.edit');
    Route::put('/paiement/{paiement}', [CreditPaiementController::class, 'update'])->name('paiement.update');
    //Visite Techniques
    Route::get('/visitetechnique/add/{voiture?}', [VisiteTechniqueController::class, 'create'])->name('visitetechnique.add');
    Route::post('/visitetechnique/store/{voiture?}', [VisiteTechniqueController::class, 'store'])->name('visitetechnique.store');
    Route::delete('/visitetechnique/delete/{visitetechnique}', [VisiteTechniqueController::class, 'destroy'])->name('visitetechnique.destroy');
    Route::get('/visitetechnique/{visitetechnique}/edit/', [VisiteTechniqueController::class, 'edit'])->name('visitetechnique.edit');
    Route::put('/visitetechnique/update/{visitetechnique}', [VisiteTechniqueController::class, 'update'])->name('visitetechnique.update');
    Route::get('/visitestechnique', [VisiteTechniqueController::class, 'index'])->name('visitetechnique.index');
    Route::get('/visitestechnique/{voiture}', [VisiteTechniqueController::class, 'voitureVisiteTechnique'])->name('visitetechnique.voiture');
    //Client
    Route::resource('clients', ClientController::class);
    // OptionSupplimentaire
    Route::resource('options', OptionSupplimentaireController::class);
    Route::get('options/{option}', [OptionSupplimentaireController::class, 'show']);
    //Booking
    Route::resource('bookings', BookingController::class);
    //Convoyage
    Route::resource('convoyages', ConvoyageController::class);
    // Assurance
    Route::resource('assurances', AssuranceController::class);
    Route::get('assurances/create/{id?}', [AssuranceController::class, 'create'])->name('assurances.add');
    Route::get('/assurance/{voiture}', [AssuranceController::class, 'voitureAssurance'])->name('assurance.voiture');
    // Vignettes
    Route::resource('vignettes', VignettesController::class);
    Route::get('vignettes/create/{id?}', [VignettesController::class, 'create'])->name('vignettes.add');
    Route::get('/vignette/{voiture}', [VignettesController::class, 'voitureVignette'])->name('vignette.voiture');
    // Vidange
    Route::resource('vidanges', VidangeController::class);
    Route::get('vidange/create/{id?}', [VidangeController::class, 'create'])->name('vidanges.add');
    Route::get('/vidange/{voiture}', [VidangeController::class, 'voitureVidange'])->name('vidange.voiture');
    // Autorisation
    Route::resource('autorisations', CirculationAutorisationController::class);
    Route::get('/autorisation/{voiture}', [CirculationAutorisationController::class, 'voitureAutorisation'])->name('autorisation.voiture');
    // Panne
    Route::resource('pannes', PanneController::class);
    Route::get('/panne/{voiture}', [PanneController::class, 'voiturePanne'])->name('panne.voiture');
    // Distribution Chain
    Route::resource('chains', DistributionChainController::class);
    Route::get('/chain/{voiture}', [DistributionChainController::class, 'voitureChain'])->name('chain.voiture');
    // Company
    Route::resource('companies', CompanyController::class);
    // Voiture Historique
    Route::resource('historiques', VoitureHistoriqueController::class);
    // Centre Visite
    Route::resource('centreVisites', CentreVisiteController::class);
    // Assureur
    Route::resource('assureurs', AssureurController::class);

    Route::get('/profile-image', [ProfileController::class, 'displayProfileImage'])->name('profile.image');


    Route::match(['post', 'patch'], '/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});


require __DIR__.'/auth.php';
