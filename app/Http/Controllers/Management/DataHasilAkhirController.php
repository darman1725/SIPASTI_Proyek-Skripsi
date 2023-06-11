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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataHasilAkhirExport;

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

    public function exportExcel(Request $request)
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
        $minMaxValues = [];
    }

    // Hitung total bobot
    $totalBobot = $kriteria->sum('bobot');

    $no = 1;
    $data = [];

    foreach ($pendaftaran as $keys) {
        $nilai_total = 0;
        $nilai_kriteria = [];

        foreach ($kriteria as $key) {
            $data_pencocokan = DataPerhitungan::data_nilai($keys->id, $key->id);
            $min_max = DataPerhitungan::get_max_min($key->id);

            if ($totalBobot != 0) {
                $bobot_normalisasi = $key->bobot / $totalBobot;
            } else {
                $bobot_normalisasi = 0;
            }

            if ($min_max && $min_max['max'] != $min_max['min']) {
                if ($key->jenis == "Benefit") {
                    $nilai_utility = ($data_pencocokan->nilai - $min_max['min']) / ($min_max['max'] - $min_max['min']);
                } else {
                    $nilai_utility = ($min_max['max'] - $data_pencocokan->nilai) / ($min_max['max'] - $min_max['min']);
                }
            } else {
                $nilai_utility = 0;
            }

            $nilai_total += $bobot_normalisasi * $nilai_utility;

            if (!is_null($data_pencocokan) && isset($data_pencocokan->nilai)) {
                $nilai_kriteria[$key->id] = $data_pencocokan->nilai;
            } else {
                $nilai_kriteria[$key->id] = null;
            }
        }

        $data[] = [
            'id_pendaftaran' => $keys->user->nama_lengkap,
            'jenis_kegiatan' => $keys->kegiatan->nama . ' - ' . $keys->kegiatan->jenis,
            'nilai' => $nilai_total,
            'nilai_kriteria' => $nilai_kriteria
        ];
    }

    // Sort the data based on 'nilai' in descending order
    usort($data, function ($a, $b) {
        return $b['nilai'] <=> $a['nilai'];
    });

    $exportData = [];

    foreach ($data as $index => $item) {
        $nilaiKriteria = [];
        foreach ($item['nilai_kriteria'] as $nilai) {
            $nilaiKriteria[] = $nilai;
        }
    
        $exportData[] = [
            'no' => $no,
            'id_pendaftaran' => $item['id_pendaftaran'],
            'jenis_kegiatan' => $item['jenis_kegiatan'],
            ...$nilaiKriteria,
            'nilai' => $item['nilai'],
            'ranking' => $index + 1
        ];
    
        $no++;
    }

    $export = new DataHasilAkhirExport($exportData, $kodeKriteria, $kriteria);
    return Excel::download($export, 'data_hasil_akhir.xlsx');
    }

}