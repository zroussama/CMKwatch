<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('costumers', App\Http\Controllers\API\costumerAPIController::class)
  ->except(['create', 'edit']);   
  //Postman affiche erreur 500 pour post avec fichier JSON

  /* JSON FILE
  {
   
    "nom":"oussama",    
    "prenom":"zribi",   
    "email":"ohussama@gmail.com",
    "phone":98123456,
    "created_at":"2023-02-01T16:08:28.000000Z",
    "updated_at":"2023-02-16T16:08:28.000000Z"
    }
  */

Route::resource('avions', App\Http\Controllers\API\AvionAPIController::class)
    ->except(['create', 'edit']);