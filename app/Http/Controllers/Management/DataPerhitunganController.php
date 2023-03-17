<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPerhitungan;
use Illuminate\Http\Request;

class DataPerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.data_perhitungan.index');
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
     * @param  \App\Models\DataPerhitungan  $dataPerhitungan
     * @return \Illuminate\Http\Response
     */
    public function show(DataPerhitungan $dataPerhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPerhitungan  $dataPerhitungan
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPerhitungan $dataPerhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPerhitungan  $dataPerhitungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPerhitungan $dataPerhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPerhitungan  $dataPerhitungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPerhitungan $dataPerhitungan)
    {
        //
    }
}
