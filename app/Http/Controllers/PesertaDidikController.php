<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesertaDidikRequest;
use App\Http\Requests\UpdatePesertaDidikRequest;
use App\Models\PesertaDidik;

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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function show(PesertaDidik $pesertaDidik)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function edit(PesertaDidik $pesertaDidik)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function destroy(PesertaDidik $pesertaDidik)
  {
    //
  }
}
