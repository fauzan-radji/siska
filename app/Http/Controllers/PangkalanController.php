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
    $this->authorize('viewAny', Pangkalan::class);
    return view('dashboard.pangkalan.index', [
      'pangkalans' => Pangkalan::where('verified', true)->get()
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function waitingRoom()
  {
    $this->authorize('verifyAny', Pangkalan::class);
    return view('dashboard.pangkalan.index', [
      'pangkalans' => Pangkalan::where('verified', false)->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create', Pangkalan::class);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePangkalanRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePangkalanRequest $request)
  {
    $this->authorize('create', Pangkalan::class);
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

    return redirect('/')->with('success', 'Berhasil mendaftarkan pangkalan ' . $validated['nama_pangkalan']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function show(Pangkalan $pangkalan)
  {
    $this->authorize('view', $pangkalan);
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
    $this->authorize('update', $pangkalan);
    $no_gudep = explode('-', $pangkalan->no_gudep)[1];
    $no_gudep = explode('/', $no_gudep);
    $ambalan = explode('-', $pangkalan->ambalan);
    return view('dashboard.pangkalan.edit', [
      'kwarrans' => Kwarran::all(),
      'pangkalan' => $pangkalan,
      'no_gudep' => [
        'putra' => $no_gudep[0],
        'putri' => $no_gudep[1]
      ],
      'ambalan' => [
        'putra' => $ambalan[0],
        'putri' => $ambalan[1]
      ]
    ]);
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
    $this->authorize('update', $pangkalan);
    $validated = $request->validate([
      "nama" => 'required',
      "kwarran_id" => 'required',
      "no_gudep_putra" => 'required',
      "no_gudep_putri" => 'required',
      "ambalan_putra" => 'required',
      "ambalan_putri" => 'required',
      "alamat" => 'required',
    ]);

    $pangkalan->update($validated);

    return redirect('/dashboard/pangkalan/' . $pangkalan->id)->with('success', 'Berhasil mengubah pangkalan ' . $validated['nama']);
  }

  /**
   * Verify the specified resource in storage.
   *
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function verify(UpdatePangkalanRequest $request, Pangkalan $pangkalan)
  {
    $this->authorize('verify', $pangkalan);
    $validated = [
      'no_gudep' => null
    ];

    if (!$pangkalan->verified) {
      $validated = $request->validate(['no_gudep' => 'required']);
    }

    $pangkalan->update([
      'verified' => !$pangkalan->verified,
      'no_gudep' => $validated['no_gudep']
    ]);

    $msg = $pangkalan->verified ? 'memverifikasi ' : 'membatalkan verifikasi ';
    return back()->with('success', 'Berhasil ' . $msg . $pangkalan->nama);
  }

  /**
   * Verify all resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePangkalanRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function verifyAll(UpdatePangkalanRequest $request)
  {
    $this->authorize('verifyAll', Pangkalan::class);
    Pangkalan::all()->each(
      fn ($pangkalan) => $pangkalan->update([
        'verified' => $request->action === 'verify'
      ])
    );
    $msg = $request->action === 'verify' ? 'memverifikasi semua pangkalan' : 'membatalkan semua verifikasi';
    return back()->with('success', 'Berhasil ' . $msg);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pangkalan $pangkalan)
  {
    $this->authorize('delete', $pangkalan);
    $pangkalan->delete();
    return back()->with('success', 'Berhasil menghapus pangkalan ' . $pangkalan->nama);
  }
}
