<?php
namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\Pendaftaran;
use App\Http\Requests\DataKegiatanRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class DataKegiatanController extends Controller
{

    public function index()
    {
        $kegiatans = DataKegiatan::all();
        $pendaftaran = Pendaftaran::all();
        $pendaftarans = Pendaftaran::with('user', 'kegiatan')->where('id_data_user', Auth::id())->get();
        return view('menu.data_kegiatan.index', compact('kegiatans', 'pendaftaran', 'pendaftarans'));
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
        $kegiatan->detail_kegiatan = $request->detail_kegiatan;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('public/kegiatan', $gambarName);
            $kegiatan->gambar = $gambarName;
        }

        $kegiatan->save();

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
        $kegiatan->detail_kegiatan = $request->detail_kegiatan;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('public/kegiatan', $gambarName);
            $kegiatan->gambar = $gambarName;
        }
        $kegiatan->save();

        return redirect()->route('kegiatan');
    }

    public function destroy(DataKegiatan $kegiatan)
    {
    $gambarPath = 'public/kegiatan/' . $kegiatan->gambar;
    if (Storage::exists($gambarPath)) {
        Storage::delete($gambarPath);
    }

    $kegiatan->delete();

    return redirect()->route('kegiatan');
    }
}