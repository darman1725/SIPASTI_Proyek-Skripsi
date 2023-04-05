<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPerhitungan;
use App\Models\Management\DataHasilAkhir;
use Illuminate\Http\Request;

class DataHasilAkhirController extends Controller
{
    public function index()
    {
        // // mengambil data hasil akhir dari model DataHasilAkhir
        // $hasil = DataHasilAkhir::all();

        // // mengirim data hasil akhir ke view index.blade.php
        // return view('management.data_hasil_akhir.index', ['hasil' => $hasil]);

        $data = [
            'page' => "Perhitungan",
            'kriteria'=> DataPerhitungan::get_kriteria(),
            'alternatif'=> DataPerhitungan::get_alternatif(),
        ];

        return view('management.data_hasil_akhir.index', $data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(DataHasilAkhir $dataHasilAkhir)
    {
        
    }

    public function edit(DataHasilAkhir $dataHasilAkhir)
    {
        
    }

    public function update(Request $request, DataHasilAkhir $dataHasilAkhir)
    {
        
    }

    public function destroy(DataHasilAkhir $dataHasilAkhir)
    {
        
    }
}
