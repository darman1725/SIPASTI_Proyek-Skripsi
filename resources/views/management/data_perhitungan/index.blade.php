<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matrix Keputusan (X)</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $key)
                            <th>{{ $key->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($alternatif as $keys)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td align="left">{{ $keys->nama }}</td>
                            @foreach ($kriteria as $key)
                            <td>
                                @php
                                $data_pencocokan = App\Models\Management\DataPerhitungan::data_nilai($keys->id,
                                $key->id);
                                @endphp
                                @if(!is_null($data_pencocokan) && isset($data_pencocokan->nilai))
                                {{ $data_pencocokan->nilai }}
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @endforeach
                        <tr align="center" class="bg-light">
                            <th colspan="2">Max</th>
                            @foreach ($kriteria as $key)
                            <th>
                                @php
                                $min_max=App\Models\Management\DataPerhitungan::get_max_min($key->id);
                                if(!is_null($min_max) && isset($min_max['max'])){
                                    echo $min_max['max'];
                                }
                                @endphp
                            </th>
                            @endforeach
                        </tr>
                        <tr align="center" class="bg-light">
                            <th colspan="2">Min</th>
                            @foreach ($kriteria as $key)
                            <th>
                                @php
                                $min_max=App\Models\Management\DataPerhitungan::get_max_min($key->id);
                                if(!is_null($min_max) && isset($min_max['min'])){
                                    echo $min_max['min'];
                                }
                                @endphp
                            </th>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Kriteria (W)</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            @foreach ($kriteria as $key)
                            <th>{{ $key->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            @foreach ($kriteria as $key)
                            <td>{{ $key->bobot }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Normalisasi Bobot Kriteria</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            @foreach ($kriteria as $key)
                            <th>{{ $key->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            @foreach ($kriteria as $key)
                            @php
                            $total_bobot = app('App\Models\Management\DataPerhitungan')->get_total_kriteria();
                            @endphp
                            <td>{{ $key->bobot / $total_bobot['total_bobot'] ?? 0 }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Nilai Utility (U)</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Alternatif</th>
                            @foreach ($kriteria as $key)
                            <th>{{ $key->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($alternatif as $keys)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td align="left">{{ $keys->nama }}</td>
                            @foreach ($kriteria as $key)
                            <td>
                                @php
                                $data_pencocokan =
                                app('App\Models\Management\DataPerhitungan')->data_nilai($keys->id,$key->id);
                                $min_max=app('App\Models\Management\DataPerhitungan')->get_max_min($key->id);
                                $min_max = (object) $min_max; // ubah array menjadi objek
                                if ($min_max->max == $min_max->min) {
                                // echo "Indefinited";
                                echo 0;
                                } else {
                                if ($key->jenis == "Benefit") {
                                echo @(($data_pencocokan->nilai-$min_max->min)/($min_max->max-$min_max->min));
                                } else {
                                echo @(($min_max->max-$data_pencocokan->nilai)/($min_max->max-$min_max->min));
                                }
                                }
                                @endphp
                            </td>
                            @endforeach
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                            <th width="15%">Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_bobot = \App\Models\Management\DataPerhitungan::get_total_kriteria();
                        foreach ($alternatif as $keys) {
                        ?>
                        <tr align="center">
                            <td>
                                <?= $no; ?>
                            </td>
                            <td align="left">
                                <?= $keys->nama ?>
                            </td>
                            <?php
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
                                $hasil_akhir = [
                                    'id_data_alternatif' => $keys->id,
                                    'nilai' => $nilai_total
                                ];
                                \App\Models\Management\DataPerhitungan::insert_hasil($hasil_akhir);
                                ?>
                            <td>
                                <?= $nilai_total; ?>
                            </td>
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>