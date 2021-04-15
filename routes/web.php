<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\BrController;

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
Route::get('activites/details/{br}',[BrController::class,'details'])->name('activites.details');
Route::get('activites/etat/{br}',[BrController::class,'etat'])->name('activites.etat');