<?php

use App\Http\Controllers\CompterenduController;
use App\Http\Controllers\RubriqueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('rubriques/add', [RubriqueController::class, 'add']);
Route::get('rubriques/delete/{id}', [RubriqueController::class, 'delete']);

Route::post('/compterendus/add', [CompterenduController::class, 'add']);
Route::get('/compterendus/delete/{id}', [CompterenduController::class, 'delete']);

