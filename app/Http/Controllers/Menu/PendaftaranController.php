<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Models\Information\User;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\Pendaftaran;
use App\Models\Menu\DataAlternatif;
use App\Http\Controllers\Controller; 
use App\Http\Requests\DataPendaftaranRequest;  
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('user', 'kegiatan')->get();
        return view('menu.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $users = User::all();
        $kegiatans = DataKegiatan::all();
        $pendaftarans = Pendaftaran::with('user', 'kegiatan')->get();
        return view('menu.pendaftaran.create', compact('users', 'kegiatans', 'pendaftarans'));
    }

    public function store(DataPendaftaranRequest $request)
    {
        $validatedData = $request->validated();

        $pendaftaran = Pendaftaran::create($validatedData);

        $data_alternatif = DataAlternatif::create([
            'id_pendaftaran' => $pendaftaran->id
        ]);

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dibuat');
    }

    public function show($id)
    {
        $pendaftarans = Pendaftaran::findOrFail($id);
        return view('menu.pendaftaran.show', compact('pendaftarans'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $users = User::all();
        $kegiatans = DataKegiatan::all();
        return view('menu.pendaftaran.edit', compact('pendaftaran', 'users', 'kegiatans'));
    }

    public function update(DataPendaftaranRequest $request, Pendaftaran $pendaftaran)
    {
        $validatedData = $request->validated();

        $pendaftaran->update($validatedData);

        $data_alternatif = $pendaftaran->data_alternatif;
        $data_alternatif->update([
            'id_pendaftaran' => $pendaftaran->id
        ]);

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil diupdate');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $data_alternatif = $pendaftaran->data_alternatif;

        if ($data_alternatif) {
            $data_alternatif->delete();
        }

        if ($pendaftaran) {
            $pendaftaran->delete();
            return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dihapus');
        } else {
            return redirect()->route('pendaftaran')->with('error', 'Data pendaftaran tidak ditemukan');
        }
    }
}
