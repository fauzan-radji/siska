<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kwarran;
use App\Models\Pembina;
use App\Models\Pangkalan;
use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  // Show regist form for pangkalan
  public function createPangkalan()
  {
    return view('register.pangkalan', [
      'kwarrans' => Kwarran::all()
    ]);
  }

  // Show regist form for pangkalan and using data from regist pangkalan
  public function postPangkalan(Request $request)
  {
    $validated = $request->validate([
      "nama_pangkalan" => 'required',
      "kwarran_id" => 'required',
      "jenjang_pembinaan" => 'required',
      // "no_gudep_putra" => 'required',
      // "no_gudep_putri" => 'required',
      // "ambalan_putra" => 'required',
      // "ambalan_putri" => 'required',
      "alamat_pangkalan" => 'required'
    ]);
    return view('register.admin_pangkalan', $validated);
  }

  // Store pangkalan to db
  public function storePangkalan(Request $request)
  {
    $validated = $request->validate([
      "nama_pangkalan" => 'required',
      "kwarran_id" => 'required',
      // "no_gudep_putra" => 'required',
      // "no_gudep_putri" => 'required',
      // "ambalan_putra" => 'required',
      // "ambalan_putri" => 'required',
      "jenjang_pembinaan" => 'required',
      "alamat_pangkalan" => 'required',
      "nama_admin" => 'required',
      "username_admin" => 'required',
      "email_admin" => 'required',
      "password_admin" => 'required',
    ]);

    // get kwarran data
    $kwarran = Kwarran::find($validated['kwarran_id']);
    // $no_gudep = "{$kwarran->nomor}-{$validated['no_gudep_putra']}/{$validated['no_gudep_putri']}";
    // $ambalan = $validated['ambalan_putra'] . '-' . $validated['ambalan_putri'];

    // create new pangkalan
    $pangkalan = Pangkalan::create([
      'nama' => $validated['nama_pangkalan'],
      'jenjang_pembinaan' => $validated['jenjang_pembinaan'],
      // 'no_gudep' => $no_gudep,
      // 'ambalan' => $ambalan,
      'kwarran_id' => $kwarran->id,
      'alamat' => $validated['alamat_pangkalan']
    ]);

    // and create the admin of pangkalan
    Pembina::create([
      'user_id' => User::create([
        'nama' => $validated['nama_admin'],
        'username' => $validated['username_admin'],
        'email' => $validated['email_admin'],
        'password' => Hash::make($validated['password_admin']),
      ])->id,
      'pangkalan_id' => $pangkalan->id,
      'jabatan' => 'Admin Pangkalan',
      'verified' => true
    ]);
    return redirect('/login')->with('success', 'Berhasil mendaftarkan pangkalan ' . $pangkalan->nama);
  }

  public function createPembina()
  {
    return view('register.pembina', [
      'pangkalans' => Pangkalan::all()
    ]);
  }

  public function storePembina(Request $request)
  {
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'password' => 'required|min:8',
      'email' => 'required|email',
      'jabatan' => 'required',
      'pangkalan_id' => 'required'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    Pembina::create([
      'user_id' => User::create($validated)->id,
      'pangkalan_id' => $validated['pangkalan_id'],
      'jabatan' => $validated['jabatan']
    ]);

    return redirect('/login')->with('success', 'Berhasil mendaftarkan pembina ' . $validated['nama']);
  }

  // Show regist form for peserta didik
  public function createPesertaDidik()
  {
    return view('register.peserta_didik', [
      'pangkalans' => Pangkalan::all()
    ]);
  }

  // Store peserta didik to db
  public function storePesertaDidik(Request $request)
  {
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'password' => 'required|min:8',
      'email' => 'required|email',
      'pangkalan_id' => 'required'
    ]);

    // Create Peserta Didik
    PesertaDidik::create([
      'user_id' => User::create([
        'nama' => $validated['nama'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password'])
      ])->id,
      'pangkalan_id' => $validated['pangkalan_id']
    ]);

    return redirect('/login')->with('success', 'Berhasil mendaftarkan peserta didik ' . $validated['nama']);;
  }
}
