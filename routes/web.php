<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\KrsController::class, 'index']);

Route::post('/kprs', [App\Http\Controllers\KrsController::class, 'store']);

Route::get('/show/{id}', [App\Http\Controllers\KrsController::class, 'show']);

Route::post('/kprs/add/{id}/{no}/{totalsks}', [App\Http\Controllers\KrsController::class, 'add']);

Route::delete('/kprs/delete/{id}/{no}', [App\Http\Controllers\KrsController::class, 'destroy']);

Route::post('/kprs/printpdf/{id}', [App\Http\Controllers\KrsController::class, 'printpdf']);


