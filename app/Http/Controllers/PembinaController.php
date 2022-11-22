<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembinaRequest;
use App\Http\Requests\UpdatePembinaRequest;
use App\Models\Pembina;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePembinaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembinaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembina  $pembina
     * @return \Illuminate\Http\Response
     */
    public function show(Pembina $pembina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembina  $pembina
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembina $pembina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembinaRequest  $request
     * @param  \App\Models\Pembina  $pembina
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembinaRequest $request, Pembina $pembina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembina  $pembina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembina $pembina)
    {
        //
    }
}
