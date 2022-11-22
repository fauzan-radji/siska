<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePangkalanRequest;
use App\Http\Requests\UpdatePangkalanRequest;
use App\Models\Pangkalan;

class PangkalanController extends Controller
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
     * @param  \App\Http\Requests\StorePangkalanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePangkalanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pangkalan  $pangkalan
     * @return \Illuminate\Http\Response
     */
    public function show(Pangkalan $pangkalan)
    {
        //
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
