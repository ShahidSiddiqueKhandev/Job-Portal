<?php

use Illuminate\Support\Facades\Route;
use App\Models\Nazione;
use App\Models\Citta;


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
   return Nazione::select([
      'Nazione.nome as Nazione',
      'c.nome as Citta'
   ])
      ->join('Citta as c', 'c.nazione_id', '=', 'Nazione.id')
      ->get()
      ;
});

Route::get('/test', function () {
   return 2;
});
