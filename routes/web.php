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

Route::get('/', function () {
    return view('principal');
});

Route::get('/acercaDe', function () {
    return view('acerca-de');
});


Auth::routes();

Route::get('/administrador/admin-noticias', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
