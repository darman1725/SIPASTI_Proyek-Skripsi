<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Hasil Akhir</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        @page {
            margin: 2cm;
        }

        body {
            margin: 0.5cm 0;
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        table td {
            padding: 5px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <h2>Data Hasil Akhir</h2>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Alternatif</th>
                <th width="15%">Total Nilai</th>
                <th width="10%">Rangking</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $total_bobot = \App\Models\Management\DataPerhitungan::get_total_kriteria();
                $alternatif = \App\Models\Menu\DataAlternatif::orderBy('nama', 'asc')->get();
                $alternatif_data = array();
                foreach ($alternatif as $keys) {
                    $nilai_total = 0;
                    foreach ($kriteria as $key) {
                        $data_pencocokan = \App\Models\Management\DataPerhitungan::data_nilai($keys->id, $key->id);
                        $min_max = \App\Models\Management\DataPerhitungan::get_max_min($key->id);
                        $bobot_normalisasi = ($data_pencocokan - $min_max->min) / ($min_max->max - $min_max->min);
                        $nilai_total += $bobot_normalisasi * ($key->bobot / $total_bobot);
                    }
                    $alternatif_data[] = array(
                        'id' => $keys->id,
                        'nama' => $keys->nama,
                        'nilai_total' => $nilai_total
                    );
                }

                // sort alternatif berdasarkan nilai total dari yang terbesar ke terkecil
                usort($alternatif_data, function ($a, $b) {
                    return $b['nilai_total'] <=> $a['nilai_total'];
                });

                // set rangking
                for ($i = 0; $i < count($alternatif_data); $i++) {
                    if ($i == 0) {
                        $alternatif_data[$i]['rangking'] = 1;
                    } else {
                        if ($alternatif_data[$i]['nilai_total'] == $alternatif_data[$i - 1]['nilai_total']) {
                            $alternatif_data[$i]['rangking'] = $alternatif_data[$i - 1]['rangking'];
                        } else {
                            $alternatif_data[$i]['
