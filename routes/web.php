<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentosController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/documentos', [DocumentosController::class, 'index'])->name('listar_documentos');
Route::get('/documentos/{id}', [DocumentosController::class, 'show']);
//Route::get('more-documentos', 'App\Http\Controllers\DocumentosController@paginate')->name('paginate.more-documentos');