<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\DataPerhitungan;
use App\Models\Management\DataHasilAkhir;
use Illuminate\Http\Request;
use PDF;

class DataHasilAkhirController extends Controller
{
    public function index()
    {
        $data = [
            'page' => "Perhitungan",
            'kriteria'=> DataPerhitungan::get_kriteria(),
            'alternatif'=> DataPerhitungan::get_pendaftaran(),
        ];

        return view('management.data_hasil_akhir.index', $data);
    }
    
    public function generatePDF(Request $request)
    {
    $data = [
        'page' => "Perhitungan",
        'kriteria'=> DataPerhitungan::get_kriteria(),
        'alternatif'=> DataPerhitungan::get_pendaftaran(),
    ];

    // Menambahkan kondisi untuk memastikan bahwa ada data yang dikirim dari halaman yang ingin di-generate PDF
    if ($request->filled('data')) {
        $data = json_decode($request->data, true); // mengambil data dari halaman yang ingin di-generate PDF
    }

    $pdf = PDF::loadView('management.data_hasil_akhir.pdf-template', $data); // load view PDF template dengan data yang dibutuhkan

    return $pdf->stream('laporan-hasil-akhir.pdf'); // menampilkan PDF dalam browser dengan nama file yang diinginkan
    }

}
