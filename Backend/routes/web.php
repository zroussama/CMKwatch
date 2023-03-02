<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\Admin\ArticlesController;

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

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

//Route::resource('connexions', ConnexionController::class);

// Route::resource('connections', App\Http\Controllers\API\ConnectionAPIController::class);
// Route::resource('voitures', App\Http\Controllers\VoitureController::class);
// Route::resource('connections', App\Http\Controllers\ConnectionController::class);
// Route::resource('fiches', App\Http\Controllers\FicheController::class);
// Route::resource('personnes', App\Http\Controllers\personneController::class);
// Route::resource('portfolios', App\Http\Controllers\portfolioController::class);
// Route::resource('c-m-k-s', App\Http\Controllers\CMKController::class);