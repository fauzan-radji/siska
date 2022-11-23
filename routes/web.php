<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KwarranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PangkalanController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PesertaDidikController;
use App\Models\Kwarran;
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

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', function () {
  return view('landing', [
    'kwarrans' => Kwarran::all()
  ]);
})->name('login');

Route::get('/dashboard', function () {
  return view('dashboard.index');
})->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/dashboard/admin', AdminController::class)->middleware('auth');
Route::resource('/dashboard/kwarran', KwarranController::class)->middleware('auth');

Route::post('/pangkalan', [PangkalanController::class, 'store'])->middleware('guest');
Route::resource('/dashboard/pangkalan', PangkalanController::class)->middleware('auth');

Route::resource('/dashboard/pembina', PembinaController::class)->middleware('auth');
Route::resource('/dashboard/peserta_didik', PesertaDidikController::class)->middleware('auth');
