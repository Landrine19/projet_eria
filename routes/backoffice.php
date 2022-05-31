<?php

use App\Models\Membre;
use App\Models\Typeevenement;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'users'], function () {
        Route::get("/tableau", [App\Http\Controllers\UsersController::class, 'dashboard'])->name('dashboard');
        Route::get("/profile", [App\Http\Controllers\UsersController::class, 'profile'])->name('users.profile');
        Route::post("/profile", [App\Http\Controllers\UsersController::class, 'profileUpdate'])->name('profile.update');
        Route::post("/updating", [App\Http\Controllers\UsersController::class, 'profileUpdating'])->name('profile.updating');
        Route::post("/post-add", [App\Http\Controllers\UsersController::class, 'addPoste'])->name('poste.add');
        Route::post("/post-delete", [App\Http\Controllers\UsersController::class, 'deletePoste'])->name('poste.delete');
        Route::get('/poste/edit/{id}', [App\Http\Controllers\UsersController::class, 'editPoste'])->name('poste.edit');
        buildRouteGroup('users', App\Http\Controllers\UsersController::class);
    });
    Route::group(['prefix' => 'reunions'], function () {
        buildRouteGroup('reunions', App\Http\Controllers\EvenementsController::class);
        Route::post('/add-participant', [App\Http\Controllers\EvenementsController::class, 'addParticipant'])->name('participant.add');
        Route::post('/add-participant', [App\Http\Controllers\EvenementsController::class, 'ajouterParticipant'])->name('participant.add');
        Route::post('', [App\Http\Controllers\EvenementsController::class, 'resumeEvent'])->name('evenements.resume');
        Route::post('/presence', [App\Http\Controllers\EvenementsController::class, 'presenceEvent'])->name('participant.presence');
        Route::post('/delete-participant', [App\Http\Controllers\EvenementsController::class, 'deleteParticipant'])->name('participant.delete');
    });
    Route::group(['prefix' => 'projet'], function () {
        buildRouteGroup('projet', App\Http\Controllers\ProjetsController::class);
        Route::post('', [App\Http\Controllers\ProjetsController::class, 'stateProjet'])->name('projet.state');
    });
    Route::group(['prefix' => 'publication'], function () {
        buildRouteGroup('publication', App\Http\Controllers\PublicationsController::class);
        Route::post('', [App\Http\Controllers\PublicationsController::class, 'resumePublication'])->name('publication.resume');
    });
    Route::group(['prefix' => 'offre'], function () {
        buildRouteGroup('offre', App\Http\Controllers\OffresController::class);
    });
    Route::group(['prefix' => 'taches'], function () {
        buildRouteGroup('taches', App\Http\Controllers\TachesController::class);
    });
    Route::group(['prefix' => 'auteurs'], function () {
        buildRouteGroup('auteurs', App\Http\Controllers\AuteursController::class);
    });
    Route::group(['prefix' => 'contacts'], function () {
        buildRouteGroup('contacts', App\Http\Controllers\ContactsController::class);
    });
    Route::group(['prefix' => 'postes'], function () {
        buildRouteGroup('postes', App\Http\Controllers\PostesController::class);
    });
    
    Route::group(['prefix'  => 'typeevenements'], function ($id) {
        buildRouteGroup('typeevenements', App\Http\Controllers\TypeevenementController::class);
    });

    Route::group(['prefix'  => 'membres'], function ($id) {
        buildRouteGroup('membres', App\Http\Controllers\MembreController::class);
    });

    Route::group(['prefix'  => 'partenaires'], function ($id) {
        buildRouteGroup('partenaires', App\Http\Controllers\PartenaireController::class);
    });

    Route::group(['prefix'  => 'typecontacts'], function ($id) {
        buildRouteGroup('typecontacts', App\Http\Controllers\TypecontactController::class);
    });

    Route::group(['prefix'  => 'informations'], function ($id) {
        buildRouteGroup('informations', App\Http\Controllers\InformationController::class);
    });

    Route::group(['prefix'  => 'sections'], function ($id) {
        buildRouteGroup('sections', App\Http\Controllers\InformationController::class);
    });
});
