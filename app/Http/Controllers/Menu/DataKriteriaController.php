<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataKriteria;
use App\Models\Menu\DataKegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\DataKriteriaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataKriteriaController extends Controller
{
    public function index(Request $request)
    {
    $data_kriteria = DataKriteria::with('kegiatan')->orderBy('id', 'ASC');
    $selectedKegiatanId = $request->input('id_data_kegiatan');

     // Calculate the total bobot for the selected kegiatan
     $totalBobot = DataKriteria::where('id_data_kegiatan', $selectedKegiatanId)->sum('bobot');

    // Set session value for selected kegiatan and total bobot
    session(['selectedKegiatanId' => $selectedKegiatanId, 'totalBobot' => $totalBobot]);

    if ($selectedKegiatanId) {
        $data_kriteria->where('id_data_kegiatan', $selectedKegiatanId);
    }
    
    $data_kriteria = $data_kriteria->get();
    $data_kegiatan = DataKegiatan::orderBy('nama')->get();

    return view('menu.data_kriteria.index', compact('data_kriteria','selectedKegiatanId', 'totalBobot', 'data_kegiatan'));
    }

    public function create()
    {
    $data_kegiatan = DataKegiatan::all();
    $selectedKegiatanId = session('selectedKegiatanId');
    $totalBobot = session('totalBobot');

    return view('menu.data_kriteria.create', compact('data_kegiatan', 'selectedKegiatanId', 'totalBobot'));
    }

    public function store(DataKriteriaRequest $request)
    {
        $id_data_kegiatan = $request->id_data_kegiatan;
        
        // Calculate the total bobot for the selected kegiatan
        $totalBobot = DataKriteria::where('id_data_kegiatan', $id_data_kegiatan)->sum('bobot');
        $newBobot = $request->bobot;
        $maxBobot = 100;

        // Check if the total bobot exceeds the maximum allowed
        if (($totalBobot + $newBobot) > $maxBobot) {
            return redirect()->route('data_kriteria.create')->withInput()
            ->with('error', 'Bobot kriteria yang anda inputkan melebihi batas yang diizinkan');
        }

        $dataKriteria = new DataKriteria([
            'id_data_kegiatan' => $id_data_kegiatan,
            'keterangan' => $request->keterangan,
            'kode_kriteria' => $request->kode_kriteria,
            'bobot' => $newBobot,
            'jenis' => $request->jenis
        ]);
        $dataKriteria->save();

        return redirect()->route('data_kriteria', ['id_data_kegiatan' => $id_data_kegiatan])
            ->with('success', 'Data Kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
    $data_kriteria = DataKriteria::find($id);
    $data_kegiatan = DataKegiatan::all();
    $selectedKegiatanId = session('selectedKegiatanId');
    $totalBobot = session('totalBobot');

    return view('menu.data_kriteria.edit', compact('data_kriteria', 'data_kegiatan', 'selectedKegiatanId', 'totalBobot'));
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
    $id_data_kegiatan = $request->id_data_kegiatan;
    $newBobot = $request->bobot;
    $maxBobot = 100;

    // Calculate the total bobot for the selected kegiatan excluding the current criterion being updated
    $totalBobot = DataKriteria::where('id_data_kegiatan', $id_data_kegiatan)
        ->where('id', '!=', $id)
        ->sum('bobot');

    // Check if the total bobot exceeds the maximum allowed
    if (($totalBobot + $newBobot) > $maxBobot) {
        return redirect()->route('data_kriteria.edit', ['data_kriterium' => $id])->with('error', 'Total bobot kriteria melebihi batas yang diizinkan');
    }

    $data_kriteria->kode_kriteria = $request->kode_kriteria;
    $data_kriteria->keterangan = $request->keterangan;
    $data_kriteria->bobot = $newBobot;
    $data_kriteria->jenis = $request->jenis;
    $data_kriteria->id_data_kegiatan = $id_data_kegiatan;

    $data_kriteria->save();

    return redirect()->route('data_kriteria', ['id_data_kegiatan' => $id_data_kegiatan])->with('success', 'Data kriteria berhasil diupdate');
    }

    public function destroy($id)
    {
    $data_kriteria = DataKriteria::find($id);

    if (!$data_kriteria) {
        return redirect()->route('data_kriteria')->with('error', 'Data kriteria tidak ditemukan');
    }

    // Delete the related data_penilaian records
    $data_kriteria->data_penilaian()->delete();

    $oldSelectedKegiatanId = $data_kriteria->id_data_kegiatan; // simpan nilai kegiatan yang dipilih sebelumnya
    $data_kriteria->delete();

    return redirect()->route('data_kriteria', ['id_data_kegiatan' => $oldSelectedKegiatanId])->with('success', 'Data kriteria berhasil dihapus');
    }

}