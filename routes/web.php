<?php

use App\Models\Kwarran;
use App\Models\Pangkalan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KwarranController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PangkalanController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', fn () => view('landing'));

Route::get('/register/peserta_didik', [RegisterController::class, 'createPesertaDidik'])->middleware(('guest'));
Route::post('/register/peserta_didik', [RegisterController::class, 'storePesertaDidik'])->middleware(('guest'));

Route::get('/register/pangkalan', [RegisterController::class, 'createPangkalan'])->middleware(('guest'));
Route::post('/register/pangkalan', [RegisterController::class, 'postPangkalan'])->middleware(('guest'));
Route::post('/register/admin_pangkalan', [RegisterController::class, 'storePangkalan'])->middleware(('guest'));

Route::get('/register/pembina', [RegisterController::class, 'createPembina'])->middleware(('guest'));
Route::post('/register/pembina', [RegisterController::class, 'storePembina'])->middleware(('guest'));

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', fn () => view('dashboard.index'))->middleware('auth');
Route::resource('/dashboard/admin', AdminController::class)->middleware('auth');
Route::resource('/dashboard/kwarran', KwarranController::class)->middleware('auth');

Route::post('/pangkalan', [PangkalanController::class, 'store'])->middleware('guest');
Route::resource('/dashboard/pangkalan', PangkalanController::class)->middleware('auth');

Route::resource('/dashboard/pembina', PembinaController::class)->middleware('auth');

Route::post('/peserta_didik', [PesertaDidikController::class, 'store'])->middleware('guest');
Route::resource('/dashboard/peserta_didik', PesertaDidikController::class)->middleware('auth');
