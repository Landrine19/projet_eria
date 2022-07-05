<?php

use App\Http\Controllers\EvenementsController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\SendMailController;
use App\Jobs\SendEmail;
use App\Mail\ReunionMail;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

include __DIR__.'/site.php';
include __DIR__.'/backoffice.php';

Auth::routes();


function buildRouteGroup($name,$controller){
    Route::get('/',[$controller,'index'])->name("$name.index");
    Route::post('/create',[$controller,'create'])->name("$name.create");
    Route::post('/update',[$controller,'update'])->name("$name.update");
    Route::get('/edit/{id}',[$controller,'edit'])->name("$name.edit");
    Route::get('/delete/{id}',[$controller,'delete'])->name("$name.delete");
    Route::get('/single/{id}',[$controller,'single'])->name("$name.space");
}

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'],function(){
        Voyager::routes();
});

Route::get('/test', function(Request $request){
    
});

Route::post('/fichiers/store', [FichierController::class, 'store'])->name('fichiers.store');
Route::get('/fichiers/delete/{id}', [FichierController::class, 'delete'])->name('fichiers.delete');

Route::post('justification', [EvenementsController::class, 'justifier'])->name('justifier');
Route::get('/present/{membre_id}/{evenement_id}', [EvenementsController::class, 'present']);

Route::get('/evenements/reunions', [EvenementsController::class, 'aff_reunions'])->name('agenda.reunions');
Route::get('/evenements/reunions/{id}', [EvenementsController::class, 'browseReunion'])->name('site.reunions.browse');