<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataSubKriteria;
use Illuminate\Http\Request;

class DataSubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.data_sub_kriteria.index');
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
     * @param  \App\Models\DataSubKriteria  $dataSubKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(DataSubKriteria $dataSubKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataSubKriteria  $dataSubKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(DataSubKriteria $dataSubKriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataSubKriteria  $dataSubKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataSubKriteria $dataSubKriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataSubKriteria  $dataSubKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataSubKriteria $dataSubKriteria)
    {
        //
    }
}
