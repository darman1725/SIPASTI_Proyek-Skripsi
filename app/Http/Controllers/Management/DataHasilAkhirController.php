<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\Pendaftaran;
use App\Models\Menu\DataKriteria;
use App\Models\Management\DataPerhitungan;
use App\Models\Management\DataHasilAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PDF;

class DataHasilAkhirController extends Controller
{
    public function index(Request $request)
    {
        $selectedKegiatan = $request->input('kegiatan');
        $kriteria = DataKriteria::with('kegiatan')->get();
        $pendaftaran = DataPerhitungan::get_pendaftaran();
    
        if ($selectedKegiatan) {
            // Filter pendaftaran based on selected kegiatan
            $filteredPendaftaran = collect($pendaftaran)->filter(function ($item) use ($selectedKegiatan) {
                return $item->id_data_kegiatan == $selectedKegiatan;
            });
    
            $pendaftaranIds = $filteredPendaftaran->pluck('id')->toArray();
    
            $pendaftaran = Pendaftaran::with('user')
                ->whereIn('id', $pendaftaranIds)
                ->get();
    
            // Filter the kriteria based on selected kegiatan
            $kriteria = $kriteria->filter(function ($item) use ($selectedKegiatan) {
                return $item->kegiatan->id == $selectedKegiatan;
            });
    
            // Get the kode_kriteria values related to the selected kegiatan
            $kodeKriteria = $kriteria->pluck('kode_kriteria')->toArray();
    
            // Get min and max values for each kode_kriteria from the filtered pendaftaran data
            $minMaxValues = [];
            foreach ($kodeKriteria as $kode) {
                $minMaxValues[$kode] = [
                    'min' => $pendaftaran->min("nilai_{$kode}"),
                    'max' => $pendaftaran->max("nilai_{$kode}")
                ];
            }
        } else {
            $pendaftaranIds = Arr::pluck($pendaftaran, 'id');
    
            $pendaftaran = Pendaftaran::with('user')
                ->whereIn('id', $pendaftaranIds)
                ->get();
    
            $kodeKriteria = $kriteria->pluck('kode_kriteria')->toArray();
            $minMaxValues = []; // Initialize an empty array for minMaxValues
        }
    
        // Get distinct kegiatan options for filtering
        $kegiatanOptions = DataKegiatan::all();
    
        $data = [
            'page' => "Perhitungan",
            'kriteria' => $kriteria,
            'pendaftaran' => $pendaftaran,
            'selectedKegiatan' => $selectedKegiatan,
            'kodeKriteria' => $kodeKriteria, // Pass the filtered kode_kriteria values to the view
            'kegiatanOptions' => $kegiatanOptions,
            'minMaxValues' => $minMaxValues // Add minMaxValues to the data array
        ];
    
        // Hitung total bobot
        $totalBobot = $kriteria->sum('bobot'); // Anda perlu menyesuaikan nama kolom bobot sesuai dengan struktur tabelnya
    
        // Tambahkan totalBobot ke dalam data
        $data['totalBobot'] = $totalBobot;

        if ($request->has('print')) {
            // Panggil method untuk membuat dan menampilkan dokumen PDF
            return $this->printPDF($data);
        }
    
        return view('management.data_hasil_akhir.index', $data, [
            'selectedKegiatan' => $request->input('kegiatan'),
        ]);
    }

    public function printPDF($data)
    {
    $pdf = PDF::loadView('management.data_hasil_akhir.print', $data);
    return $pdf->stream('data_hasil_akhir.pdf');
    }


}
