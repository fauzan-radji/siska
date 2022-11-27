<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesertaDidikRequest;
use App\Http\Requests\UpdatePesertaDidikRequest;
use App\Models\Pangkalan;
use App\Models\PesertaDidik;
use App\Models\User;
use App\Models\Agama;
use Illuminate\Support\Facades\Hash;

class PesertaDidikController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.peserta_didik.index', [
      'peserta_didiks' => auth()->user()->pembina->pangkalan->peserta_didiks
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
   * @param  \App\Http\Requests\StorePesertaDidikRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePesertaDidikRequest $request)
  {
    // Validasi
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

    // redirect to landing
    return redirect('/')->with('success', 'Berhasil mendaftarkan user ' . $validated['nama']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function show(PesertaDidik $pesertaDidik)
  {
    return view('dashboard.peserta_didik.show', [
      'peserta_didik' => $pesertaDidik
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function edit(PesertaDidik $pesertaDidik)
  {
    return view('dashboard.peserta_didik.edit', [
      'peserta_didik' => $pesertaDidik,
      'pangkalans' => Pangkalan::all(),
      'agamas' => Agama::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePesertaDidikRequest  $request
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePesertaDidikRequest $request, PesertaDidik $pesertaDidik)
  {
    // Validasi
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'email' => 'required|email',
      'pangkalan_id' => 'required'
    ]);

    $pesertaDidik->user->update([
      'nama' => $validated['nama'],
      'username' => $validated['username'],
      'email' => $validated['email'],
    ]);

    $pesertaDidik->update([
      'pangkalan_id' => $validated['pangkalan_id'],
      'gender' => $request->gender,
      'no_hp' => $request->no_hp,
      'alamat' => $request->alamat,
      'tanggal_lahir' => $request->tanggal_lahir,
      'agama_id' => $request->agama_id
    ]);

    return redirect('/dashboard/peserta_didik/' . $pesertaDidik->id)->with('success', 'Berhasil mengubah data ' . $validated['nama']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function destroy(PesertaDidik $pesertaDidik)
  {
    $nama = $pesertaDidik->user->nama;
    $pesertaDidik->delete();
    return back()->with('success', 'Berhasil menghapus Peserta Didik ' . $nama);
  }
}
