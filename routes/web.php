<?php

use App\Models\Kwarran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KwarranController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PangkalanController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\PoinController;
use App\Http\Controllers\RegisterController;
use App\Models\Pangkalan;
use App\Models\Pembina;
use App\Models\PesertaDidik;
use App\Models\Poin;

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

Route::get('/dashboard', function () {
  $data = [];
  $user = auth()->user();

  if ($user->isPesertaDidik()) return view('dashboard.peserta_didik.show', ['peserta_didik' => $user->peserta_didik]);

  if ($user->isAdmin()) {
    $data['kwarrans'] = Kwarran::all();
    $data['pangkalans'] = Pangkalan::all();
    $data['peserta_didiks'] = PesertaDidik::all();
    $data['pembinas'] = Pembina::all();
  } else if ($user->isPembina()) {
    $pembina = $user->pembina;
    $data['pembinas'] = Pembina::where('pangkalan_id', $pembina->pangkalan_id)->get();
    $data['peserta_didiks'] = PesertaDidik::where('pangkalan_id', $pembina->pangkalan_id)->get();
  } else if ($user->isPesertaDidik()) {
    $data['poins'] = $user->peserta_didik->poins;
  }

  return view('dashboard.index', $data);
})->middleware('auth');

Route::resource('/dashboard/admin', AdminController::class)->middleware('auth');
Route::resource('/dashboard/kwarran', KwarranController::class)->middleware('auth');

Route::get('/dashboard/pangkalan/waitingroom', [PangkalanController::class, 'waitingRoom'])->middleware('auth');
Route::post('/dashboard/pangkalan/verifyall', [PangkalanController::class, 'verifyAll'])->middleware('auth');
Route::post('/dashboard/pangkalan/{pangkalan}/verify', [PangkalanController::class, 'verify'])->middleware('auth');
Route::resource('/dashboard/pangkalan', PangkalanController::class)->middleware('auth');

Route::get('/dashboard/pembina/waitingroom', [PembinaController::class, 'waitingRoom'])->middleware('auth');
Route::post('/dashboard/pembina/verifyall', [PembinaController::class, 'verifyAll'])->middleware('auth');
Route::post('/dashboard/pembina/{pembina}/verify', [PembinaController::class, 'verify'])->middleware('auth');
Route::resource('/dashboard/pembina', PembinaController::class)->middleware('auth');

Route::get('/dashboard/peserta_didik/waitingroom', [PesertaDidikController::class, 'waitingRoom'])->middleware('auth');
Route::post('/dashboard/peserta_didik/verifyall', [PesertaDidikController::class, 'verifyAll'])->middleware('auth');
Route::post('/dashboard/peserta_didik/{pesertaDidik}/verify', [PesertaDidikController::class, 'verify'])->middleware('auth');
Route::post('/dashboard/peserta_didik/{pesertaDidik}/teruji', [PesertaDidikController::class, 'uji'])->middleware('auth');
Route::resource('/dashboard/peserta_didik', PesertaDidikController::class)->middleware('auth');

Route::resource('/dashboard/jadwal', JadwalController::class)->middleware('auth');
Route::resource('/dashboard/poin', PoinController::class)->middleware('auth');
