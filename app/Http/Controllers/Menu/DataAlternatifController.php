<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataAlternatif;
use Illuminate\Http\Request;

class DataAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.data_alternatif.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function show(DataAlternatif $dataAlternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAlternatif $dataAlternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAlternatif $dataAlternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAlternatif  $dataAlternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAlternatif $dataAlternatif)
    {
        //
    }
}
