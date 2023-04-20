<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu\DataKegiatan;
use App\Http\Requests\DataKegiatanRequest;
use Illuminate\Support\Facades\Storage;

class DataKegiatanController extends Controller
{

    public function index()
    {
        $kegiatans = DataKegiatan::all();
        return view('menu.data_kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('menu.data_kegiatan.create');
    }

    public function store(DataKriteriaRequest $request)
{
    $data_kriteria = new DataKriteria();
    $data_kriteria->kode_kriteria = $request->kode_kriteria;
    $data_kriteria->keterangan = $request->keterangan;
    $data_kriteria->bobot = $request->bobot;
    $data_kriteria->jenis = $request->jenis;
    $data_kriteria->save();

    $kegiatan = $request->id_data_kegiatan ?? [];

    if (!empty($kegiatan)) {
        foreach ($kegiatan as $kg) {
            $data_kriteria->dataKegiatan()->attach($kg);
        }
    }

    return redirect()->route('data_kriteria')->with('success', 'Data kriteria berhasil ditambahkan!');
}

    public function edit(DataKegiatan $kegiatan)
    {
        return view('menu.data_kegiatan.edit', compact('kegiatan'));
    }

    public function update(DataKegiatanRequest $request, DataKegiatan $kegiatan)
    {
        $kegiatan->nama = $request->nama;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->tanggal_mulai = $request->tanggal_mulai;
        $kegiatan->tanggal_selesai = $request->tanggal_selesai;
        $kegiatan->kuota = $request->kuota;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('public/kegiatan', $gambarName);
            $kegiatan->gambar = $gambarName;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan')
            ->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    public function destroy(DataKegiatan $kegiatan)
    {
        Storage::delete('public/kegiatan/' . $kegiatan->gambar);
        $kegiatan->delete();

        return redirect()->route('kegiatan')
            ->with('success', 'Data kegiatan berhasil dihapus.');
    }
}
