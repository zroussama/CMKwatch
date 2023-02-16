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

Route::resource('connexions', ConnexionController::class);
Route::get('/articles',                               'Admin\ArticlesController@index');

Route::get('/admin/articles',                               'Admin\ArticlesController@index');
Route::get('/admin/articles/create',                        'Admin\ArticlesController@create');
Route::post('/admin/articles',                              'Admin\ArticlesController@store');
Route::get('/admin/articles/{article}/edit',                'Admin\ArticlesController@edit')->name('admin/articles/edit');
Route::post('/admin/articles/{article}',                    'Admin\ArticlesController@update')->name('admin/articles/update');
Route::delete('/admin/articles/{article}',                  'Admin\ArticlesController@destroy')->name('admin/articles/destroy');


Route::get('/admin/articles-with-relationships',            'Admin\ArticlesWithRelationshipController@index');
Route::get('/admin/articles-with-relationships/create',     'Admin\ArticlesWithRelationshipController@create');
Route::post('/admin/articles-with-relationships',           'Admin\ArticlesWithRelationshipController@store');
Route::get('/admin/articles-with-relationships/{articlesWithRelationship}/edit','Admin\ArticlesWithRelationshipController@edit')->name('admin/articles-with-relationships/edit');
Route::post('/admin/articles-with-relationships/{articlesWithRelationship}','Admin\ArticlesWithRelationshipController@update')->name('admin/articles-with-relationships/update');
Route::delete('/admin/articles-with-relationships/{articlesWithRelationship}','Admin\ArticlesWithRelationshipController@destroy')->name('admin/articles-with-relationships/destroy');

Route::get('/admin/articles',                               'Admin\ArticlesController@index');
Route::get('/admin/articles/create',                        'Admin\ArticlesController@create');
Route::post('/admin/articles',                              'Admin\ArticlesController@store');
Route::get('/admin/articles/{article}/edit',                'Admin\ArticlesController@edit')->name('admin/articles/edit');
Route::post('/admin/articles/bulk-destroy',                 'Admin\ArticlesController@bulkDestroy')->name('admin/articles/bulk-destroy');
Route::post('/admin/articles/{article}',                    'Admin\ArticlesController@update')->name('admin/articles/update');
Route::delete('/admin/articles/{article}',                  'Admin\ArticlesController@destroy')->name('admin/articles/destroy');