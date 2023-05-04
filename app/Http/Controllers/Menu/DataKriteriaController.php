<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataKriteria;
use App\Models\Menu\DataKegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\DataKriteriaRequest;

class DataKriteriaController extends Controller
{
    public function index(Request $request)
    {
        $data_kriteria = DataKriteria::with('kegiatan')->orderBy('id', 'ASC');
        $selectedKegiatanId = $request->input('id_data_kegiatan');
        if ($selectedKegiatanId) {
        $data_kriteria->where('id_data_kegiatan', $selectedKegiatanId);
        }
        $data_kriteria = $data_kriteria->get();
        $data_kegiatan = DataKegiatan::orderBy('nama')->get();

        return view('menu.data_kriteria.index', compact('data_kriteria', 'data_kegiatan', 'selectedKegiatanId'));
    }

    public function create()
    {
        $data_kegiatan = DataKegiatan::all();
        return view('menu.data_kriteria.create', compact('data_kegiatan'));
    }

    public function store(DataKriteriaRequest $request)
    {
    $dataKriteria = new DataKriteria([
        'id_data_kegiatan' => $request->id_data_kegiatan,
        'keterangan' => $request->keterangan,
        'kode_kriteria' => $request->kode_kriteria,
        'bobot' => $request->bobot,
        'jenis' => $request->jenis
    ]);
    $dataKriteria->save();

    return redirect()->route('data_kriteria', ['id_data_kegiatan' => $request->id_data_kegiatan])
        ->with('success', 'Data Kriteria berhasil dibuat');
    }

    public function edit($id)
    {
        $data_kriteria = DataKriteria::find($id);
        $data_kegiatan = DataKegiatan::all();

        return view('menu.data_kriteria.edit', compact('data_kriteria', 'data_kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'keterangan' => 'required',
            'bobot' => 'required|numeric|min:0',
            'jenis' => 'required',
            'id_data_kegiatan' => 'required',
        ]);
    
        $data_kriteria = DataKriteria::find($id);
        $data_kriteria->kode_kriteria = $request->kode_kriteria;
        $data_kriteria->keterangan = $request->keterangan;
        $data_kriteria->bobot = $request->bobot;
        $data_kriteria->jenis = $request->jenis;
        $data_kriteria->id_data_kegiatan = $request->id_data_kegiatan;
    
        $data_kriteria->save();
    
        return redirect()->route('data_kriteria', ['id_data_kegiatan' => $request->id_data_kegiatan])->with('success', 'Data kriteria berhasil diupdate');
    }    

    public function destroy($id)
    {
    $data_kriteria = DataKriteria::find($id);

    if (!$data_kriteria) {
        return redirect()->route('data_kriteria')->with('error', 'Data kriteria tidak ditemukan');
    }
    
    $oldSelectedKegiatanId = $data_kriteria->id_data_kegiatan; // simpan nilai kegiatan yang dipilih sebelumnya
    $data_kriteria->forceDelete();    

    return redirect()->route('data_kriteria', ['id_data_kegiatan' => $oldSelectedKegiatanId])->with('success', 'Data kriteria berhasil dihapus');
    }

}