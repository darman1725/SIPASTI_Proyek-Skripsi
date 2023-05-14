<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataAlternatif;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Requests\DataAlternatifRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataAlternatifController extends Controller
{
    public function index(Request $request)
    {
        $selectedKegiatanId = $request->input('id_data_kegiatan');

        $pendaftarans = Pendaftaran::with('kegiatan')
            ->when($selectedKegiatanId, function ($query, $selectedKegiatanId) {
                return $query->where('id_data_kegiatan', $selectedKegiatanId);
            })
            ->orderBy('id', 'ASC')
            ->get();
    
        $data_kegiatan = DataKegiatan::all();
        
        return view('menu.data_alternatif.index', compact('pendaftarans','data_kegiatan','selectedKegiatanId'));
    }

    public function create()
    {
        return view('menu.data_alternatif.create');
    }

    public function store(DataAlternatifRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);

        $data_alternatif = new DataAlternatif;
        $data_alternatif->nama = $request->nama;
        $data_alternatif->save();

        return redirect()->route('data_alternatif')->with('success', 'Data Alternatif berhasil ditambahkan');
    }

    public function show(DataAlternatif $dataAlternatif)
    {
        //
    }

    public function edit($id)
    {
        $data_alternatif = DataAlternatif::findOrFail($id);
        return view('menu.data_alternatif.edit', compact('data_alternatif'));
    }

    public function update(DataAlternatifRequest $request, $id)
    {
        $data_alternatif = DataAlternatif::find($id);

        $validate =  $request->validate([
            'nama' => 'required'
        ]);

        $data_alternatif->update($validate);

        return redirect()->route('data_alternatif')->with('success', 'Data Alternatif berhasil diupdate');
    }

    public function destroy($id)
    {
        $data_alternatif = DataAlternatif::findOrFail($id);
        $data_alternatif->delete();

        return redirect()->route('data_alternatif')->with('success', 'Data Alternatif berhasil dihapus');
    }
}
