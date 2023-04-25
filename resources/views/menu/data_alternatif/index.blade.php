<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>

        {{-- <a href="{{ route('data_alternatif.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah
            Data
        </a> --}}
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
                                <option value="{{ $kegiatan->id }}" {{ $kegiatan->id == $selectedKegiatanId ? 'selected' : '' }}>{{ $kegiatan->nama }}</option>
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
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Tujuan Kegiatan</th>
                            {{-- <th width="15%">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftarans as $data)
                        <tr style="text-align: center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->user->nama_lengkap }} </td>
                            <td>{{ ucwords(strtolower($data->provinsi)) }}</td>
                            <td>{{ ucwords(strtolower($data->kabupaten_kota)) }}</td>
                            <td>{{ $data->kegiatan->nama }}</td>
                            {{-- <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                        href="{{ route('data_alternatif.edit', $data->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('data_alternatif.destroy', $data->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus data alternatif ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Hapus Data"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>