<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-journal-bookmark"></i> Data Kriteria</h1>
        <a href="{{ route('data_kriteria.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Kriteria</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('data_kriteria') }}" method="GET">
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
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                            <th>Jenis</th>
                            <th>Kegiatan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_kriteria as $dk)
                        <tr style="text-align: center">
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $dk->kode_kriteria }}</td>
                            <td>{{ $dk->keterangan }}</td>
                            <td>{{ $dk->bobot }}</td>
                            <td>{{ $dk->jenis }}</td>
                            <td>{{ $dk->kegiatan->nama }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                        href="{{ route('data_kriteria.edit', $dk->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                    </a>
                                    <div class="ml-2">
                                        <form action="{{route('data_kriteria.destroy', $dk->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data kriteria ini ?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
                                