<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BrController;
use App\Http\Controllers\DetailController;

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
Route::resource('agents',AgentController::class);
Route::resource('activites',ActiviteController::class);
Route::resource('brs',BrController::class);
Route::resource('details',DetailController::class);
Route::get('activite/details/{id}',[BrController::class,'details'])->name('activites.details');
Route::get('activite/etat/{id}',[BrController::class,'etat'])->name('activites.etat');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
