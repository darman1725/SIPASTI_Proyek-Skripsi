<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPerhitungan;
use Illuminate\Http\Request;

class DataPerhitunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if (auth()->user()->id_user_level != "1") {
        //     return redirect()->route('home')->with('error', 'Anda tidak berhak mengakses halaman ini!');
        // }

        $data = [
            'page' => "Perhitungan",
            'kriteria'=> DataPerhitungan::get_kriteria(),
            'alternatif'=> DataPerhitungan::get_alternatif(),
        ];

        return view('management.data_perhitungan.index', $data);
    }

    public function hasil()
    {
        $data = [
            'page' => "Hasil",
            'hasil'=> DataPerhitungan::get_hasil()
        ];

        return view('hasil', $data);
    }
}
