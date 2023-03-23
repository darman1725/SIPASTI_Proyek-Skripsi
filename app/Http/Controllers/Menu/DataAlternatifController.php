<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataAlternatif;
use Illuminate\Http\Request;
use App\Http\Requests\DataAlternatifRequest;


class DataAlternatifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_alternatif = DataAlternatif::all();
        return view('menu.data_alternatif.index', compact('data_alternatif'));
    }

    public function create()
    {
        return view('menu.data_alternatif.create');
    }

    public function store(DataAlternatifRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);

        $data_alternatif = new DataAlternatif;
        $data_alternatif->nama = $request->nama;
        $data_alternatif->save();

        return redirect('data_alternatif')->with('success', 'Data Alternatif berhasil dibuat');
    }

    public function show(DataAlternatif $dataAlternatif)
    {
        //
    }

    public function edit($id)
    {
        $data_alternatif = DataAlternatif::findOrFail($id);
        return view('menu.data_alternatif.edit', compact('data_alternatif'));
    }

    public function update(DataAlternatifRequest $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);

        $data_alternatif = new DataAlternatif;
        $data_alternatif->nama = $request->nama;
        $data_alternatif->save();

        return redirect('data_alternatif')->with('success', 'Data Alternatif berhasil diupdate');
    }

    public function destroy($id)
    {
        $data_alternatif = DataAlternatif::findOrFail($id);
        $data_alternatif->delete();

        return redirect('data_alternatif')->with('success', 'Data Alternatif berhasil dihapus');
    }
}
