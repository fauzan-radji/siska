<?php

use App\Http\Controllers\LoginController;
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
  return view('landing');
})->name('login');

Route::get('/dashboard', function () {
  return view('dashboard.index', [
    'kwarrans' => Kwarran::all()
  ]);
})->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
