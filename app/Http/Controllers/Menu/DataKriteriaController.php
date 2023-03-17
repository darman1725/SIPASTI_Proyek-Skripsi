<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataKriteria;
use Illuminate\Http\Request;

class DataKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.data_kriteria.index');
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
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(DataKriteria $dataKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(DataKriteria $dataKriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKriteria $dataKriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKriteria $dataKriteria)
    {
        //
    }
}
