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
        $gambarName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('storage/gambar'), $gambarName);

        Kegiatan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarName,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'id_data_kriteria' => $request->id_data_kriteria,
        ]);

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

        $kegiatan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarName,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'id_data_kriteria' => $request->id_data_kriteria,
        ]);

        return redirect()->route('kegiatan.index')->with('success', __('Data Kegiatan Berhasil Diupdate'));
    }

    public function destroy(Kegiatan $kegiatan)
    {
        Storage::delete(public_path('storage/gambar/'.$kegiatan->gambar));
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', __('Data Kegiatan Berhasil Dihapus'));
    }
}
