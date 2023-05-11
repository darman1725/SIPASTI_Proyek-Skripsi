<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPerhitungan;
use Illuminate\Http\Request;
use App\Models\Menu\Pendaftaran;

class DataPerhitunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'page' => "Perhitungan",
            'kriteria'=> DataPerhitungan::get_kriteria(),
            'pendaftaran'=> DataPerhitungan::get_pendaftaran(),
        ];

         // eager loading untuk memuat relasi user
        $data['pendaftaran'] = Pendaftaran::with('user')->get();

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
