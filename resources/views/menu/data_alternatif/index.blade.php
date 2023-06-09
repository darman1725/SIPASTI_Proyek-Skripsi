<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-people-fill"></i> Data Alternatif</h1>
    </div>

    @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Alternatif</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('data_alternatif') }}" method="GET">
                <div class="form-group row">
                    <label for="id_data_kegiatan" class="col-sm-2 col-form-label">Pilih Kegiatan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_data_kegiatan">
                            <option value="">-- Semua Kegiatan --</option>
                            @foreach($data_kegiatan as $kegiatan)
                            <option value="{{ $kegiatan->id }}" {{ $kegiatan->id == $selectedKegiatanId ? 'selected' :
                                '' }}>{{ $kegiatan->nama }} - {{ $kegiatan->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr style="text-align: center">
                            <th width="5%">No</th>
                            <th>Nama Pelamar</th>
                            <th>Daerah Saat Ini</th>
                            <th>Tujuan Kegiatan</th>
                            <th>Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftarans as $pendaftaran)
                        <tr style="text-align: center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftaran->user->nama_lengkap }}</td>
                            <td>{{ ucwords(strtolower($pendaftaran->provinsi)) }},<br>
                                {{ ucwords(strtolower($pendaftaran->kabupaten_kota)) }},<br>
                                {{ ucwords(strtolower($pendaftaran->kecamatan)) }}
                            </td>
                            <td>{{ $pendaftaran->kegiatan->nama }}</td>
                            <td>
                                @if ($pendaftaran->kegiatan->jenis == 'Lapangan')
                                <span class="badge bg-success text-white">{{ $pendaftaran->kegiatan->jenis }}</span>
                                @elseif ($pendaftaran->kegiatan->jenis == 'Pengolahan')
                                <span class="badge bg-primary text-white">{{ $pendaftaran->kegiatan->jenis }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>