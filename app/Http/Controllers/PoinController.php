<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePoinRequest;
use App\Http\Requests\UpdatePoinRequest;
use App\Models\Poin;

class PoinController extends Controller
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
     * @param  \App\Http\Requests\StorePoinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function show(Poin $poin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function edit(Poin $poin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePoinRequest  $request
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePoinRequest $request, Poin $poin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poin $poin)
    {
        //
    }
}
