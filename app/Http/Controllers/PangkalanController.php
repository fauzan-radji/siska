<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePangkalanRequest;
use App\Http\Requests\UpdatePangkalanRequest;
use App\Models\Pangkalan;
use App\Models\Kwarran;
use App\Models\Pembina;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PangkalanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.pangkalan.index', [
      'kwarrans' => Kwarran::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePangkalanRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePangkalanRequest $request)
  {
    $validated = $request->validate([
      "nama_pangkalan" => 'required',
      "kwarran_id" => 'required',
      "no_gudep_putra" => 'required',
      "no_gudep_putri" => 'required',
      "ambalan_putra" => 'required',
      "ambalan_putri" => 'required',
      "alamat_pangkalan" => 'required',
      "nama_admin" => 'required',
      "username_admin" => 'required',
      "email_admin" => 'required',
      "password_admin" => 'required',
    ]);

    // get kwarran data
    $kwarran = Kwarran::find($validated['kwarran_id']);
    $no_gudep = "{$kwarran->nomor}-{$validated['no_gudep_putra']}/{$validated['no_gudep_putri']}";
    $ambalan = $validated['ambalan_putra'] . '-' . $validated['ambalan_putri'];

    // create new pangkalan
    $pangkalan = Pangkalan::create([
      'nama' => $validated['nama_pangkalan'],
      'no_gudep' => $no_gudep,
      'ambalan' => $ambalan,
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
      'jabatan' => 'Admin Pangkalan'
    ]);

    return redirect('/')->with('success', 'Berhasil mendaftarkan pangkalan ' . $validated['nama_admin']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function show(Pangkalan $pangkalan)
  {
    return view('dashboard.pangkalan.show', [
      'pangkalan' => $pangkalan
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function edit(Pangkalan $pangkalan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePangkalanRequest  $request
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePangkalanRequest $request, Pangkalan $pangkalan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pangkalan $pangkalan)
  {
    //
  }
}
