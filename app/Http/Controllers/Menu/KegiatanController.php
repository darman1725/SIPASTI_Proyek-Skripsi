<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu\Kegiatan;
use App\Models\Menu\DataKriteria;
use App\Http\Requests\DataKegiatanRequest;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('getKriteria')->get();
        return view('menu.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        $dataKriterias = DataKriteria::all();
        return view('menu.kegiatan.create', compact('dataKriterias'));
    }

    public function store(DataKegiatanRequest $request)
    {
        $gambarName = time().'.'.$request->file('gambar')->getClientOriginalExtension();
        $request->file('gambar')->move(public_path('storage/gambar'), $gambarName);
        $dataKriteria = implode(',', $request->input('data_kriteria'));
    
        $kegiatan = new Kegiatan();
        $kegiatan->nama = $request->nama;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->gambar = $gambarName;
        $kegiatan->tanggal_mulai = $request->tanggal_mulai;
        $kegiatan->tanggal_akhir = $request->tanggal_akhir;
        $kegiatan->data_kriteria = $dataKriteria;
        $kegiatan->save();
    
        return redirect()->route('kegiatan.index')->with('success', __('Data Kegiatan Berhasil Dibuat'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Kegiatan $kegiatan)
    {
        $dataKriterias = DataKriteria::all();
        return view('menu.kegiatan.edit', compact('kegiatan', 'dataKriterias'));
    }

    public function update(DataKegiatanRequest $request, Kegiatan $kegiatan)
{
    if ($request->has('gambar')) {
        $gambarName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('storage/gambar'), $gambarName);

        Storage::delete(public_path('storage/gambar/'.$kegiatan->gambar));
    } else {
        $gambarName = $kegiatan->gambar;
    }

    $dataKriteria = implode(',', $request->input('data_kriteria'));

    $kegiatan->nama = $request->nama;
    $kegiatan->deskripsi = $request->deskripsi;
    $kegiatan->gambar = $gambarName;
    $kegiatan->tanggal_mulai = $request->tanggal_mulai;
    $kegiatan->tanggal_akhir = $request->tanggal_akhir;
    $kegiatan->data_kriteria = $dataKriteria;
    $kegiatan->save();

    return redirect()->route('kegiatan.index')->with('success', __('Data Kegiatan Berhasil Diupdate'));
}

    public function destroy(Kegiatan $kegiatan)
    {
        Storage::delete(public_path('storage/gambar/'.$kegiatan->gambar));
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', __('Data Kegiatan Berhasil Dihapus'));
    }
}
