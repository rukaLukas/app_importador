<?php

use Illuminate\Support\Facades\Route;
use App\Api\Controllers\NoticiaController;
use App\Api\Controllers\ImportadorController;

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

// Route::apiResource('noticias', NoticiaController::class);
Route::post('noticias', [NoticiaController::class, 'store']);
Route::get('noticias', [NoticiaController::class, 'index']);
Route::get('paginate.documentos', [NoticiaController::class, 'paginate'])->name('paginate.documentos');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('conteudo_documento');