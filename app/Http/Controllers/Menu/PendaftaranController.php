<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\Pendaftaran;
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
        return view('menu.pendaftaran.create', compact('users', 'kegiatans','pendaftarans'));
    }

    public function store(DataPendaftaranRequest $request)
    {
        $data = $request->validated();
        $data['id_data_user'] = Auth::user()->id;
        Pendaftaran::create($data);
        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dibuat');
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $users = User::all();
        $kegiatans = DataKegiatan::all();
        return view('menu.pendaftaran.edit', compact('pendaftaran', 'users', 'kegiatans'));
    }

    public function update(DataPendaftaranRequest $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update($request->all());
        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dihapus');
    }

}
