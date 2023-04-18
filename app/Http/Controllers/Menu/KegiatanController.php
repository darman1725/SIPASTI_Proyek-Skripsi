<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu\Kegiatan;
use App\Http\Requests\DataKegiatanRequest;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{

    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('menu.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('menu.kegiatan.create');
    }

    public function store(DataKegiatanRequest $request)
    {
        $kegiatan = new Kegiatan();
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
            ->with('success', 'Data kegiatan berhasil dibuat');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('menu.kegiatan.edit', compact('kegiatan'));
    }

    public function update(DataKegiatanRequest $request, Kegiatan $kegiatan)
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

    public function destroy(Kegiatan $kegiatan)
    {
        Storage::delete('public/kegiatan/' . $kegiatan->gambar);
        $kegiatan->delete();

        return redirect()->route('kegiatan')
            ->with('success', 'Data kegiatan berhasil dihapus.');
    }
}
