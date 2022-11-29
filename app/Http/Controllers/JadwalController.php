<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jadwal;
use App\Models\Pangkalan;
use App\Models\Poin;
use App\Models\Pembina;

class JadwalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.jadwal.index', [
      'pangkalans' => Pangkalan::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create', Jadwal::class);

    return view('dashboard.jadwal.create', [
      'poins' => Poin::all(),
      'pembinas' => Pembina::where('pangkalan_id', auth()->user()->pembina->pangkalan_id)->get()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreJadwalRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreJadwalRequest $request)
  {
    $this->authorize('create', Jadwal::class);
    // Do Validation Below
    $validated = $request->validate([
      'tanggal' => 'required',
      'poin_ids' => 'required',
      'pembina_ids' => 'required'
    ]);

    $jadwal = new Jadwal();
    $jadwal->tanggal = $validated['tanggal'];
    $jadwal->pangkalan_id = auth()->user()->pembina->pangkalan_id;
    $jadwal->save();
    $jadwal->poins()->sync($validated['poin_ids']);
    $jadwal->pembinas()->sync($validated['pembina_ids']);

    return redirect('/dashboard/jadwal')->with('success', 'Berhasil menambahkan jadwal baru');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function show(Jadwal $jadwal)
  {
    $this->authorize('view', $jadwal);
    return view('dashboard.jadwal.show', [
      'jadwal' => $jadwal
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function edit(Jadwal $jadwal)
  {
    $this->authorize('update', $jadwal);
    return view('dashboard.jadwal.edit', [
      'jadwal' => $jadwal,
      'poins' => Poin::all(),
      'pembinas' => Pembina::where('pangkalan_id', auth()->user()->pembina->pangkalan_id)->get()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateJadwalRequest  $request
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
  {
    $this->authorize('update', $jadwal);
    // Do Validation Below
    $validated = $request->validate([
      'tanggal' => 'required',
      'poin_ids' => 'required',
      'pembina_ids' => 'required'
    ]);

    $jadwal->update(['tanggal' => $validated['tanggal']]);
    $jadwal->poins()->sync($validated['poin_ids']);
    $jadwal->pembinas()->sync($validated['pembina_ids']);

    return redirect('/dashboard/jadwal')->with('success', 'Berhasil mengubah data jadwal');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jadwal $jadwal)
  {
    $this->authorize('delete', $jadwal);
    $jadwal->delete();
    return back()->with('success', 'Berhasil menghapus data jadwal');
  }
}
