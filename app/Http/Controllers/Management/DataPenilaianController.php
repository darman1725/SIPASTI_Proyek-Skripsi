<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Http\Requests\DataPenilaianRequest;

class DataPenilaianController extends Controller
{
    public function index()
    {
    $data = [
        'page' => "Penilaian",
        'list' => DataPenilaian::tampil(),
        'kriteria' => DataPenilaian::get_kriteria(),
        'pendaftaran' => DataPenilaian::get_pendaftaran(),
        'sub_kriteria' => DataPenilaian::get_sub_kriteria(),
        'perhitungan' => DataPenilaian::tampil(),
        'penilaian' => DataPenilaian::all()
    ];

    // Menambahkan properti updatedTime ke setiap objek DataPenilaian
    foreach ($data['penilaian'] as $penilaian) {
        $penilaian->updatedTime = Carbon::parse($penilaian->updated_at)->format('H:i');
    }

    return view('management.data_penilaian.index', $data);
    }

    public function tambah_penilaian(DataPenilaianRequest $request)
    {
        $id_pendaftaran = $request->input('id_pendaftaran');
        $id_data_kriteria = $request->input('id_data_kriteria');
        $nilai = $request->input('nilai');
        $i = 0;
    
        foreach ($nilai as $key) {
            $dataPenilaian = DataPenilaian::firstOrCreate(
                ['id_pendaftaran' => $id_pendaftaran, 'id_data_kriteria' => $id_data_kriteria[$i]],
                ['nilai' => $key, 'created_at' => now()]
            );
            $i++;
        }
    
        $request->session()->flash('success', 'Data Penilaian berhasil ditambahkan');
        return redirect()->route('data_penilaian');
    }

    public function update_penilaian(DataPenilaianRequest $request)
    {
    $nilai = $request->input('nilai');

    foreach ($nilai as $index => $key) {
        $dataPenilaian = DataPenilaian::updateOrCreate(
            ['id_pendaftaran' => $request->input('id_pendaftaran'), 'id_data_kriteria' => $request->input('id_data_kriteria')[$index]],
            ['nilai' => $key, 'updated_at' => now()]
        );

        // Menangkap waktu terakhir kolom berhasil diupdate
        $updatedTime = Carbon::parse($dataPenilaian->updated_at)->format('H:i');

        // Menyimpan waktu terakhir ke dalam variabel untuk ditampilkan di view
        $data['updatedTime'] = $updatedTime;
    }

    $request->session()->flash('success', 'Data Penilaian berhasil diupdate');
    return redirect()->route('data_penilaian')->with($data);
    }
    
}
