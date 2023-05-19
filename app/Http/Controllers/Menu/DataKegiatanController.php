<?php
namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu\DataKegiatan;
use App\Http\Requests\DataKegiatanRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

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

        Alert::success('Sukses', 'Data berhasil ditambahkan')->autoClose(3000);
        return redirect()->route('kegiatan');
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

        Alert::success('Sukses', 'Data berhasil diupdate')->autoClose(3000);
        return redirect()->route('kegiatan');
    }

    public function destroy(DataKegiatan $kegiatan)
    {
    $gambarPath = 'public/kegiatan/' . $kegiatan->gambar;
    if (Storage::exists($gambarPath)) {
        Storage::delete($gambarPath);
    }

    $kegiatan->delete();

    // Alert::success('Sukses', 'Data berhasil dihapus')->autoClose(3000);
    return redirect()->route('kegiatan');
    }
}