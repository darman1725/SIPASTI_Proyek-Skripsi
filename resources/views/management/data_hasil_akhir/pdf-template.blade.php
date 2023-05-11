<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        @page {
            margin: 0;
            padding: 0;
            size: A4 portrait;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000;
            padding: 5px;
        }

        .bg-primary {
            background-color: #007bff !important;
            color: #fff;
        }

        .text-white {
            color: #fff;
        }
    </style>

    <div class="card shadow mb-4">
        <div class="card-header py-3" style="text-align: center">
            <h3 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Urutan Rangking</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr text-align="center">
                            <th width="5%">No</th>
                            <th>Nama Pelamar</th>
                            <th>Kegiatan</th>
                            <th>Total Nilai</th>
                            <th width="5%">Rangking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $no = 1;
                    $total_bobot = \App\Models\Management\DataPerhitungan::get_total_kriteria();
                    $pendaftaran = \App\Models\Menu\Pendaftaran::with(['user' => function ($query) {
                    $query->orderBy('nama_lengkap', 'asc');
                    }])->get();
                    $pendaftaran_data = array();
                    foreach ($pendaftaran as $keys) {
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
                        $pendaftaran_data[] = [
                            'id' => $keys->id,
                            'nama' => $keys->user->nama_lengkap,
                            'kegiatan' => $keys->kegiatan->nama,
                            'nilai_total' => $nilai_total
                        ];
                    }
    
                    // Urutkan data alternatif berdasarkan nilai total secara descending
                    $pendaftaran_data = collect($pendaftaran_data)->sortByDesc('nilai_total')->values()->all();
    
                    foreach ($pendaftaran_data as $keys) {
                    ?>
                        <tr align="center">
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td align="left">
                                <?= $keys['nama']; ?>
                            </td>
                            <td>
                                <?= $keys['kegiatan']; ?>
                            </td>
                            <td>
                                <?= $keys['nilai_total']; ?>
                            </td>
                            <td>
                                <?= $no-1; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</head>