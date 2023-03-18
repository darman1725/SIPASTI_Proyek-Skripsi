<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataKriteria;
use Illuminate\Http\Request;
use App\Http\Requests\DataKriteriaRequest;

class DataKriteriaController extends Controller
{
    public function index()
    {
        $data_kriteria = DataKriteria::all();
        return view('menu.data_kriteria.index', compact('data_kriteria'));
    }

    public function create()
    {
        $data_kriteria = DataKriteria::all();
        return view('menu.data_kriteria.create', compact('data_kriteria'));
    }

    public function store(DataKriteriaRequest $request)
    {
        $validate = $request->validated();
        $validate['keterangan'] = ($request->keterangan);
        $validate['kode_kriteria'] = ($request->kode_kriteria);
        $validate['bobot'] = ($request->bobot);
        $validate['jenis'] = ($request->jenis);
        DataKriteria::create($validate);

        return redirect()->route('data_kriteria.index')->with('success', __('Data Kriteria Berhasil Dibuat'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data_kriteria = DataKriteria::find($id);
        return view('menu.data_kriteria.edit', compact('data_kriteria'));
    }

    public function update(DataKriteriaRequest $request, $id)
    {
        $data_kriteria = DataKriteria::find($id);

        $validate = $request->validated();
        $validate['keterangan'] = ($request->keterangan);
        $validate['kode_kriteria'] = ($request->kode_kriteria);
        $validate['bobot'] = ($request->bobot);
        $validate['jenis'] = ($request->jenis);
        $data_kriteria->update($validate);

        return redirect()->route('data_kriteria.index')->with('success', __('Data Kriteria Berhasil Diupdate'));
    }

    public function destroy($id)
    {
        $data_kriteria = DataKriteria::find($id);
        $data_kriteria->delete();

        return redirect()->route('data_kriteria')->with('success', __('Data Kriteria Berhasil Dihapus'));
    }
}