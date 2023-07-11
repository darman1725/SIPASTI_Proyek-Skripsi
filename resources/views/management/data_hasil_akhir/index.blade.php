<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <form action="{{ route('data_hasil_akhir') }}" method="GET" class="d-flex">
            <div class="form-group">
                <label for="kegiatan">Filter Kegiatan:</label>
                <select name="kegiatan" id="kegiatan" class="form-control">
                    <option value="">-- Pilih Kegiatan --</option>
                    @foreach($kegiatanOptions as $option)
                    <option value="{{ $option->id }}" {{ $selectedKegiatan==$option->id ? 'selected' : '' }}>
                        {{ $option->nama }} - {{ $option->jenis }}
                    </option>
                    @endforeach
                </select>
                <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-primary"> <i class="bi bi-funnel-fill"></i> Filter</button>
                </div>
            </div>
        </form>

        @if(isset($selectedKegiatan))
        <form action="{{ route('data_hasil_akhir') }}" method="GET" style="display: inline;" target="_blank">
            <input type="hidden" name="kegiatan" value="{{ $selectedKegiatan }}">
            <button type="submit" name="print" value="1" class="btn btn-danger" formtarget="_blank">
                <i class="bi bi-file-earmark-pdf-fill"></i> Cetak
            </button>
        </form>
        @endif
    </div>

    @if(Auth::user()->level == 'admin')
    @if(isset($selectedKegiatan))
    <form action="{{ route('data-hasil-akhir.export-excel') }}" method="POST">
        @csrf
        <input type="hidden" name="kegiatan" value="{{ $selectedKegiatan }}">
        <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-excel-fill"></i> Cetak Excel</button>
    </form>
    <br>
    @endif
    @endif

    @if(isset($totalBobot) && $totalBobot < 100) @if(Auth::user()->level == 'admin')
        <div class="alert alert-danger" role="alert"><i class="bi bi-info-circle"></i>
            Proses perhitungan belum dapat dilanjutkan pada kegiatan ini. Dikarenakan data masih belum lengkap.<br>
            Silahkan lengkapi data pada menu perhitungan, agar data kegiatan ini memenuhi kaidah perhitungan.
        </div>
        <a href="{{ route('data_perhitungan') }}" class="btn btn-success btn-icon-split"><span
                class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali ke menu data perhitungan</span>
        </a>
        @else
        <div class="alert alert-danger" role="alert"><i class="bi bi-info-circle"></i>
            Proses perangkingan masih sedang berlangsung dan belum dapat dikeluarkan <br>
            oleh sistem penyelenggara seleksi rekrutmen calon petugas statistik
        </div>
        @endif
        @else
        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Nilai</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr align="center">
                                <th width="5%">No</th>
                                <th>Alternatif</th>
                                <th>Kegiatan</th>
                                @if(isset($selectedKegiatan))
                                @foreach ($kriteria as $key)
                                <th>{{ $key->kode_kriteria }}</th>
                                @endforeach
                                @endif
                                <th width="15%">Total Nilai</th>
                                <th>Rank</th>
                                <th>Status</th>
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
                            $nilai_kriteria = [];
                            
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

                                if (!is_null($data_pencocokan) && isset($data_pencocokan->nilai)) {
                                   $nilai_kriteria[$key->id] = $data_pencocokan->nilai;
                                } else {
                                   $nilai_kriteria[$key->id] = null;
                                }
                            }
                            $data[] = [
                                'id_pendaftaran' => $keys->user->nama_lengkap,
                                'jenis_kegiatan' => $keys->kegiatan->nama. ' - '. $keys->kegiatan->jenis,
                                'nilai' => $nilai_total,
                                'nilai_kriteria' => $nilai_kriteria
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
                                @foreach ($kriteria as $key)
                                <td>
                                    {{ $item['nilai_kriteria'][$key->id] }}
                                </td>
                                @endforeach
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
                </div>
            </div>
        </div>
        @endif
</x-app-layout>