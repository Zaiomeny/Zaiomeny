<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BrController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;


use App\Models\Notification;




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
    return view('welcome');
});


Route::get('/dashboard', function () {

    return view('dashboard');

})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ["auth","role:administrator|user"]],function(){
        /**
         * Route pour activités
         */
        Route::resource('activites',ActiviteController::class);
        Route::get('projet/{projets_id}/agent/{agents_id}/activites/liste',[ActiviteController::class,'liste'])->name('activites.liste');
        Route::get('projet/{projets_id}/agent/{agents_id}/activite/{activites_id}/modifier',[ActiviteController::class,'edit'])->name('activites.modifier');
        Route::get('projet/{projets_id}/agent/{agents_id}/activite/{activites_id}/mettre_a_jour',[ActiviteController::class,'modifier'])->name('activites.mettre_a_jour');
        /**
         * Route pour agents
         */
        Route::resource('agents',AgentController::class);
        Route::get('agents/{agents_id}/supprimer',[AgentController::class,'supprimer'])->name('agents.supprimer');
        Route::delete('agents/',[AgentController::class,'suppimerTout'])->name('agents.supprimerTout');
        Route::get('agents/forge/{projets_id}',[AgentController::class,'forge'])->name('agents.forge');
        
        Route::post('/projet/agents/chercher',[AgentController::class,'chercher'])->name('agents.chercher');
        Route::get('projet/{projets_id}/agent/{agents_id}/verifier',[AgentController::class,'verifier'])->name('agents.verifier');

        /**
         * Route pour br
         */
        Route::resource('brs',BrController::class);

        /**
         * Route pour details
         */
        Route::resource('details',DetailController::class);
        Route::get('details/{detail_id}/supprimer',[DetailController::class,'supprimer'])->name('details.supprimer');


        /**
         * Notifications
         */
        Route::get('notifications/effacer',[NotificationController::class,'cacher'])->name('notifications.cacher');
        Route::resource('notifications',NotificationController::class);

        /**
         * Route pour projet
         */
        Route::resource('projets',ProjetController::class);
        Route::get('projet/{projets_id}/agents/liste',[AgentController::class,'list'])->name('projets.list');
        Route::get('projet/{projets_id}/etat',[ProjetController::class,'etat'])->name('projets.etat');
        Route::post('projets/chercher',[ProjetController::class,'chercher'])->name('projets.chercher');
       

        /**
         * Route pour verifications
         */
        Route::resource('verifications',VerificationController::class);
        Route::get('verifications',[VerificationController::class,'verificationsTermine'])->name('verifications.termine');

        /**
         * Route pour users
         */
        Route::get('users/profiles',[UserController::class,'view_profile'])->name('profiles.view');
        Route::get('/users',[UserController::class,'index'])->name('users');


});


require __DIR__.'/auth.php';
