<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BeritaRequest;
use App\Models\Menu\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('menu.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('menu.berita.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'judul' => 'required',
        'kategori' => 'required',
        'tanggal_publikasi' => 'required',
        'file' => 'required|file|mimes:pdf,mp4,jpg,jpeg,png',
        'isi' => 'required',
    ]);

    $file = $request->file('file');
    $fileName = $file->getClientOriginalName();
    $file->storeAs('public/berita', $fileName);

    $berita = new Berita();
    $berita->judul = $request->judul;
    $berita->kategori = $request->kategori;
    $berita->tanggal_publikasi = $request->tanggal_publikasi;
    $berita->file = $fileName;
    $berita->isi = $request->isi;
    $berita->save();

    return redirect()->route('berita');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('menu.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
    $berita = Berita::find($id);

    $berita->judul = $request->input('judul');
    $berita->kategori = $request->input('kategori');
    $berita->tanggal_publikasi = $request->input('tanggal_publikasi');
    $berita->isi = $request->input('isi');

    if ($request->hasFile('file')) {
        // Menghapus file lama jika ada
        Storage::delete('public/berita/' . $berita->file);

        // Mengunggah file baru
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/berita', $filename);
        $berita->file = $filename;
    }

    $berita->save();

    return redirect()->route('berita');
    }


    public function destroy($id)
    {
        $berita = Berita::find($id);
        Storage::delete('public/berita/' . $berita->file);
        $berita->delete();

        return redirect()->route('berita');
    }

}
