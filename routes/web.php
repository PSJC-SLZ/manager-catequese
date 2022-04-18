<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunidadeController;

/*
|--------------------------------------------------------------------------Ø
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

//COMUDADES
Route::group(["prefix" => "admin/comunidades"], function () {
    Route::get("/", [ComunidadeController::class,"index"])->name("comunidades");
    Route::get('/create', [ComunidadeController::class,"create"])->name('comunidades');
    Route::post('/create', [ComunidadeController::class,"store"])->name('comunidades');
    Route::get('/edit/{id}', [ComunidadeController::class,"edit"])->name('comunidades');
    Route::put('/edit/{id}', [ComunidadeController::class,"update"])->name('comunidades');
    Route::post('/delete', [ComunidadeController::class,"postDelete"])->name('comunidades');
});
