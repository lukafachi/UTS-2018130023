<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonsController;

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

Route::redirect('/', '/home', 301);
Route::redirect('/blog', '/home', 301);
Route::get('/home', [PokemonsController::class, 'tampil']);
Route::get('/detail/{id?}', [PokemonsController::class, 'detailp']);
Route::get('/home/o-{order?}', [PokemonsController::class, 'tampil']);
Route::get('/home/search', [PokemonsController::class, 'search']);
Route::fallback(function () {
    return view('404');
});
