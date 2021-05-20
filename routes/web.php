<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BrController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;




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

Route::get('/', function () {
    //return view('welcome');
});

Route::resource('verifications',VerificationController::class);

Route::resource('agents',AgentController::class);
Route::get('agents/forge/{projet_id}',[AgentController::class,'forge'])->name('agents.forge');
Route::get('agents/verifier/{projet_id}/{agent_id}',[AgentController::class,'verifier'])->name('agents.verifier');

Route::resource('projets',ProjetController::class);
Route::get('projets/liste/{projet_id}',[ProjetController::class,'list'])->name('projets.list');
Route::get('projets/etat/{projet_id}',[ProjetController::class,'etat'])->name('projets.etat');

Route::resource('activites',ActiviteController::class);
Route::get('activites/liste/{projet_id}/{agent_id}',[ActiviteController::class,'liste'])->name('activites.liste');
Route::resource('brs',BrController::class);

Route::resource('details',DetailController::class);
Route::get('details/supprimer/{id}',[DetailController::class,'supprimer'])->name('details.supprimer');

Route::get('activite/details/{id}',[BrController::class,'details'])->name('activites.details');
//Route::get('activite/etat/{id}',[BrController::class,'etat'])->name('activites.etat');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('profiles/{id}',[UserController::class,'show'])->name('profiles.view');

require __DIR__.'/auth.php';
