<?php

use Illuminate\Support\Facades\Route;

Route::get('/about',[App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contacts-us',[App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/evenements',[App\Http\Controllers\HomeController::class, 'evenements'])->name('evenements');
Route::get('/event/{id}',[App\Http\Controllers\HomeController::class, 'evenementsSingle'])->name('evenements.single');
Route::get('/projets',[App\Http\Controllers\HomeController::class, 'projets'])->name('projets');
Route::get('/project/{id}',[App\Http\Controllers\HomeController::class, 'projetsSingle'])->name('projets.single');
Route::get('/annuaire',[App\Http\Controllers\HomeController::class, 'annuaire'])->name('annuaire');
Route::get('/member/{id}',[App\Http\Controllers\HomeController::class, 'memberSingle'])->name('annuaire.single');
Route::get('/offres',[App\Http\Controllers\HomeController::class, 'offres'])->name('offres');
Route::get('/offer/{id}',[App\Http\Controllers\HomeController::class, 'offresSingle'])->name('offres.single');
Route::get('/publications',[App\Http\Controllers\HomeController::class, 'publications'])->name('publications');
Route::get('/publication/{id}',[App\Http\Controllers\HomeController::class, 'publicationsSingle'])->name('publications.single');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

