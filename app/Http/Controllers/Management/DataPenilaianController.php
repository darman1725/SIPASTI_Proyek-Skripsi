<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Menu\Pendaftaran;
use App\Models\Menu\DataKegiatan;
use App\Models\Management\DataPenilaian;
use App\Models\Menu\DataKriteria;
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
        'pendaftaran' => DataPenilaian::get_pendaftaran(),
        'perhitungan' => DataPenilaian::tampil(),
        'penilaian' => DataPenilaian::all(),
        'kegiatan' => DataKegiatan::all(),
    ];

    // Ambil nama-nama kegiatan dari catatan penilaian
    $activityNames = $data['kegiatan']->pluck('nama')->unique();

    // Jika tidak ada kegiatan, atasi dengan array kosong
    if ($activityNames->isEmpty()) {
        $activityNames = collect([]);
        $criteria = [];
        $subCriteria = [];
    } else {
        // Inisialisasi array kosong untuk kriteria dan sub-kriteria
        $criteria = [];
        $subCriteria = [];

        // Loop melalui setiap nama kegiatan
        foreach ($activityNames as $activityName) {
            // Ambil kriteria dan sub-kriteria berdasarkan nama kegiatan
            $kriteria = DataKriteria::whereHas('kegiatan', function ($query) use ($activityName) {
                $query->where('nama', $activityName);
            })->get();

            // Tambahkan kriteria ke array
            $criteria[$activityName] = $kriteria;

            // Tambahkan sub-kriteria ke array
            foreach ($kriteria as $kriteriaItem) {
                $subCriteria[$activityName][$kriteriaItem->id] = $kriteriaItem->subKriteria;
            }
        }
    }

    // Tambahkan kriteria dan sub-kriteria yang diambil pada data array
    $data['kriteria'] = $criteria;
    $data['sub_kriteria'] = $subCriteria;

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

    public function hapus_penilaian(Pendaftaran $pendaftaran)
    {
    if ($pendaftaran) {
        $pendaftaran->delete();
        return redirect()->route('data_penilaian')->with('success', 'Data penilaian berhasil dihapus');
    } else {
        return redirect()->route('data_penilaian')->with('error', 'Data penilaian tidak ditemukan');
    }
    }
    
}
