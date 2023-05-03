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

    public function store(DataKegiatanRequest $request)
    {
        $kegiatan = new DataKegiatan();
        $kegiatan->nama = $request->nama;
        $kegiatan->jenis = $request->jenis;
        $kegiatan->level = $request->level;
        $kegiatan->tanggal_mulai = $request->tanggal_mulai;
        $kegiatan->tanggal_selesai = $request->tanggal_selesai;

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

    public function edit(DataKegiatan $kegiatan)
    {
        return view('menu.data_kegiatan.edit', compact('kegiatan'));
    }

    public function update(DataKegiatanRequest $request, DataKegiatan $kegiatan)
    {
        $kegiatan->nama = $request->nama;
        $kegiatan->jenis = $request->jenis;
        $kegiatan->level = $request->level;
        $kegiatan->tanggal_mulai = $request->tanggal_mulai;
        $kegiatan->tanggal_selesai = $request->tanggal_selesai;
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