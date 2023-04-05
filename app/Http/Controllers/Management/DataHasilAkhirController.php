<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPerhitungan;
use App\Models\Management\DataHasilAkhir;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class DataHasilAkhirController extends Controller
{
    public function index()
    {
        $data = [
            'page' => "Perhitungan",
            'kriteria'=> DataPerhitungan::get_kriteria(),
            'alternatif'=> DataPerhitungan::get_alternatif(),
        ];

        return view('management.data_hasil_akhir.index', $data);
    }

    public function printData()
{
    $data = array();
    $no = 1;
    $total_bobot = \App\Models\Management\DataPerhitungan::get_total_kriteria();
    $alternatif = \App\Models\Menu\DataAlternatif::orderBy('nama', 'asc')->get();
    $alternatif_data = array();

    foreach ($alternatif as $keys) {
        $nilai_total = 0;
        foreach ($kriteria as $key) {
            $data_pencocokan = \App\Models\Management\DataPerhitungan::data_nilai($keys->id, $key->id);
            $min_max = \App\Models\Management\DataPerhitungan::get_max_min($key->id);

            if ($total_bobot['total_bobot'] != 0) {
                $bobot_normalisasi = $key->bobot / $total_bobot['total_bobot'];
            } else {
                $bobot_normalisasi = 0;
            }

            if ($min_max && $min_max['max'] != $min_max['min']) {
                if ($key->jenis == "Benefit") {
                    $nilai_utility = @(($data_pencocokan->nilai - $min_max['min']) / ($min_max['max'] - $min_max['min']));
                } else {
                    $nilai_utility = @(($min_max['max'] - $data_pencocokan->nilai) / ($min_max['max'] - $min_max['min']));
                }
            } else {
                $nilai_utility = 0;
            }

            $nilai_total += $bobot_normalisasi * $nilai_utility;
        }
        $alternatif_data[] = [
            'id' => $keys->id,
            'nama' => $keys->nama,
            'nilai_total' => $nilai_total
        ];
    }

    usort($alternatif_data, function($a, $b) {
        return $b['nilai_total'] <=> $a['nilai_total'];
    });

    foreach ($alternatif_data as $keys) {
        $data[] = array(
            'no' => $no++,
            'alternatif' => $keys['nama'],
            'total_nilai' => $keys['nilai_total'],
            'rangking' => $no-1,
        );
    }

    $pdf = new DomPDF();
    $pdf->loadView('cetak_data', compact('data'));
    return $pdf->stream();
}


}
