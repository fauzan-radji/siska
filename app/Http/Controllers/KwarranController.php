<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKwarranRequest;
use App\Http\Requests\UpdateKwarranRequest;
use App\Models\Kwarran;

class KwarranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.kwarran.index', [
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
    return view('dashboard.kwarran.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreKwarranRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreKwarranRequest $request)
  {
    $validated = $request->validate([
      'nama' => 'required|min:5|max:255',
      'kamabiran' => 'required|min:3|max:255',
      'ketua' => "required|min:3|max:255"
    ]);

    Kwarran::create($validated);

    return redirect('/dashboard/kwarran')->with('success', 'Berhasil mendaftarkan ranting ' . $validated['nama']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Http\Response
   */
  public function show(Kwarran $kwarran)
  {
    return view('dashboard.kwarran.show', [
      'kwarran' => $kwarran
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Http\Response
   */
  public function edit(Kwarran $kwarran)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateKwarranRequest  $request
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateKwarranRequest $request, Kwarran $kwarran)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Http\Response
   */
  public function destroy(Kwarran $kwarran)
  {
    //
  }
}
