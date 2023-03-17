<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataHasilAkhir;
use Illuminate\Http\Request;

class DataHasilAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.data_hasil_akhir.index');
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
     * @param  \App\Models\DataHasilAkhir  $dataHasilAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(DataHasilAkhir $dataHasilAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataHasilAkhir  $dataHasilAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(DataHasilAkhir $dataHasilAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataHasilAkhir  $dataHasilAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataHasilAkhir $dataHasilAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataHasilAkhir  $dataHasilAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataHasilAkhir $dataHasilAkhir)
    {
        //
    }
}
