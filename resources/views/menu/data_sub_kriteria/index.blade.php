<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-journal-text"></i> Data Sub Kriteria</h1>
    </div>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <form method="GET" action="{{ route('data_sub_kriteria') }}">
        <div class="form-group">
            <label for="id_data_kegiatan">Filter Berdasarkan Data Kegiatan:</label>
            <select name="id_data_kegiatan" class="form-control">
                <option value="">-- Semua Kegiatan --</option>
                @foreach ($data_kegiatan as $kegiatan)
                <option value="{{ $kegiatan->id }}" {{ old('id_data_kegiatan', request('id_data_kegiatan'))==$kegiatan->
                    id ? 'selected' : '' }}>
                    {{ $kegiatan->nama }} - {{ $kegiatan->jenis }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button><br><br>
    </form>

    @if ($kriteria->isEmpty())
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Sub Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                Data masih kosong.
            </div>
        </div>
    </div>
    @else

    @foreach ($kriteria as $key)
    @if (!request('id_data_kegiatan') || $key->id_data_kegiatan == request('id_data_kegiatan'))
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-center flex-wrap">
                <h6 class="m-0 font-weight-bold text-primary mb-1" style="text-align: center">
                    <i class="fa fa-table"></i>
                    @php
                    // Ubah variabel $ksub menjadi objek dari model Kriteria
                    $key = \App\Models\Menu\DataKriteria::find($key->id);
                    @endphp
                    Kegiatan {{ $key->kegiatan->nama }} - ({{ $key->kegiatan->jenis }})
                </h6>
                <div class="d-flex justify-content-between align-items-center w-100">
                    <p class="m-0 font-weight-bold text-primary mb-1"><strong>Kriteria : {{ $key->keterangan }}
                            ({{$key->kode_kriteria }})</strong></p>
                    <a href="#tambah{{ $key->id }}" data-toggle="modal" class="btn btn-sm btn-success"> <i
                            class="fa fa-plus"></i> Tambah Data </a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambah{{ $key->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah {{
                            $key->keterangan
                            }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="POST" action="{{ route('data_sub_kriteria.store') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id_data_kegiatan" value="{{ $key->id_data_kegiatan }}">
                            <input type="hidden" name="id_data_kriteria" value="{{ $key->id }}">
                            <div class="form-group">
                                <label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
                                <input autocomplete="off" type="text" id="deskripsi" class="form-control"
                                    name="deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label for="nilai" class="font-weight-bold">Nilai</label>
                                <input autocomplete="off" type="number" id="nilai" name="nilai" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                    class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Nama Sub Kriteria</th>
                            <th>Nilai</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sub_kriteria =
                        app('App\Models\Menu\DataSubKriteria')->data_sub_kriteria($key->id);
                        $no = 1;
                        @endphp
                        @foreach ($sub_kriteria as $ksub)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td align="left">{{ $ksub->deskripsi }}</td>
                            <td>{{ $ksub->nilai }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="modal" title="Edit Data" href="#editsk{{ $ksub->id }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <div class="ml-2">
                                        <form action="{{route('data_sub_kriteria.destroy', $ksub->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data sub kriteria ini ?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="editsk{{ $ksub->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit {{
                                            $ksub->deskripsi }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <form method="post" action="{{ route('data_sub_kriteria.update', $ksub->id) }}">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <input type="hidden" name="id_data_kegiatan"
                                                value="{{ $key->id_data_kegiatan }}">
                                            <input type="hidden" name="id_data_kriteria"
                                                value="{{ $ksub->id_data_kriteria }}">
                                            <div class="form-group">
                                                <label for="deskripsi" class="font-weight-bold">Nama Sub
                                                    Kriteria</label>
                                                <input type="text" id="deskripsi" autocomplete="off"
                                                    class="form-control" value="{{ $ksub->deskripsi }}" name="deskripsi"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nilai" class="font-weight-bold">Nilai</label>
                                                <input type="number" autocomplete="off" id="nilai" name="nilai"
                                                    class="form-control" value="{{ $ksub->nilai }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                    class="fa fa-times"></i> Batal</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @php
                        $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif

</x-app-layout>