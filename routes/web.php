<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtenteController;

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


Route::any('/', [UtenteController::class, 'index']);

Route::post('/login', [UtenteController::class, 'login']);

Route::get('/registrazione', [UtenteController::class, 'registrazione']);

Route::post('/ricezione-dati', [UtenteController::class, 'insert']);

