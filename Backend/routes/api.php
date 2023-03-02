<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CMKResource;
use App\Models\CMK;

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

/*
Route::post('connections/{id}/connecter', 'App\Http\Controllers\API\ConnexionAPIController@connecter');
Route::post('connections/{id}/deconnecter', 'App\Http\Controllers\API\ConnexionAPIController@deconnecter');
Route::post('connections/{id}/generer-file', 'App\Http\Controllers\API\ConnexionAPIController@genererFile');

Route::group(['prefix' => 'api'], function () {
    Route::get('connections', [App\Http\Controllers\API\ConnectionAPIController::class, 'index']);
    Route::post('connections', [App\Http\Controllers\API\ConnectionAPIController::class, 'store']);
    Route::get('connections/{id}', [App\Http\Controllers\API\ConnectionAPIController::class, 'show']);
    Route::put('connections/{id}', [App\Http\Controllers\API\ConnectionAPIController::class, 'update']);
    Route::delete('connections/{id}', [App\Http\Controllers\API\ConnectionAPIController::class, 'destroy']);
});

Route::group(['prefix' => 'api'], function () {
    Route::resource('connections', 'App\Http\Controllers\API\ConnectionAPIController')->middleware('auth:api');
});
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('voitures', App\Http\Controllers\API\VoitureAPIController::class)
    ->except(['create', 'edit']);

Route::resource('fiches', App\Http\Controllers\API\FicheAPIController::class);
    

Route::resource('personnes', App\Http\Controllers\API\personneAPIController::class);
   

Route::resource('portfolios', App\Http\Controllers\API\portfolioAPIController::class);


Route::resource('cmk', App\Http\Controllers\API\CMKAPIController::class);

Route::get('/Code', function(){
    return CMKResource::collection(CMK::all());
});

Route::get('/code/{id}', function($id){
    return new CMKResource(CMK::findOrFail($id));
});