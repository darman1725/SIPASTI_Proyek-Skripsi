<!DOCTYPE html>
<html>

<head>
    <title>Data Hasil Akhir</title>
    <style>
        /* CSS styling untuk dokumen PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .alert {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .btn {
            display: none; /* Menghilangkan tombol Filter dan tombol Kembali saat dicetak */
        }
    </style>
</head>

<body>
    <h1>Data Hasil Akhir</h1>

    @if(isset($totalBobot) && $totalBobot < 100)
    @if(Auth::user()->level == 'admin')
    <div class="alert alert-danger">
        <i class="bi bi-info-circle"></i>
        Proses perhitungan belum dapat dilanjutkan pada kegiatan ini. Dikarenakan data masih belum lengkap.<br>
        Silahkan lengkapi data pada menu perhitungan, agar data kegiatan ini memenuhi kaidah perhitungan.
    </div>
    <a href="{{ route('data_perhitungan') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali ke menu data perhitungan</span>
    </a>
    @else
    <div class="alert alert-danger">
        <i class="bi bi-info-circle"></i>
        Proses perangkingan masih sedang berlangsung dan belum dapat dikeluarkan <br>
        oleh sistem penyelenggara seleksi rekrutmen calon petugas statistik
    </div>
    @endif
    @else
    <table>
        <thead>
            <tr align="center">
                <th width="5%">No</th>
                <th>Alternatif</th>
                <th>Kegiatan</th>
                <th width="15%">Total Nilai</th>
                <th>Rangking</th>
            </tr>
        </thead>
        <tbody>
            @if(empty($selectedKegiatan))
            <tr>
                <td colspan="3">Tidak ada kegiatan yang dipilih.</td>
            </tr>
            @else
            <?php
            $no = 1;
            $data = [];
            $total_bobot = \App\Models\Management\DataPerhitungan::get_total_kriteria();
            foreach ($pendaftaran as $keys) {
                $nilai_total = 0;
                foreach ($kriteria as $key) {
                    $data_pencocokan = \App\Models\Management\DataPerhitungan::data_nilai($keys->id, $key->id);
                    $min_max = \App\Models\Management\DataPerhitungan::get_max_min($key->id);

                    if ($total_bobot['total_bobot'] != 0) {
                        $bobot_normalisasi = $key->bobot / $totalBobot ?? 0;
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
                $data[] = [
                    'id_pendaftaran' => $keys->user->nama_lengkap,
                    'jenis_kegiatan' => $keys->kegiatan->nama . ' - ' . $keys->kegiatan->jenis,
                    'nilai' => $nilai_total
                ];
            }

            // Sort the data based on 'nilai' in descending order
            usort($data, function ($a, $b) {
                return $b['nilai'] <=> $a['nilai'];
            });

            foreach ($data as $index => $item) {
                ?>
            <tr align="center">
                <td>
                    {{ $no }}
                </td>
                <td align="left">
                    {{ $item['id_pendaftaran'] }}
                </td>
                <td>
                    {{ $item['jenis_kegiatan'] }}
                </td>
                <td>
                    {{ $item['nilai'] }}
                </td>
                <td>
                    {{ $index + 1 }}
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
            @endif
        </tbody>
    </table>
    @endif
</body>

</html>
