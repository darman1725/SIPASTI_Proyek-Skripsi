<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
    </div>

    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Alternatif</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($alternatif as $keys)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td align="left">{{ $keys->nama }}</td>
                            @php $cek_tombol = App\Models\Management\DataPenilaian::untuk_tombol($keys->id) @endphp

                            <td>
                                @if ($cek_tombol==0)
                                <a data-toggle="modal" href="#set{{ $keys->id }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-plus"></i> Beri Nilai</a>
                                @else
                                <a data-toggle="modal" href="#edit{{ $keys->id }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-edit"></i> Edit Nilai</a>
                                @endif
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="set{{ $keys->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input
                                            Penilaian</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <form method="POST" action="/tambah_penilaian">
                                        @csrf
                                        <div class="modal-body">
                                            @foreach ($kriteria as $key)
                                            @php
                                            $sub_kriteria =
                                            App\Models\Management\DataPenilaian::data_sub_kriteria($key->id);
                                            @endphp
                                            @if ($sub_kriteria!=NULL)
                                            <input type="text" name="id_data_alternatif" value="{{ $keys->id }}" hidden>
                                            <input type="text" name="id_data_kriteria[]" value="{{ $key->id }}" hidden>
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="{{ $key->id }}">{{
                                                    $key->keterangan }}</label>
                                                <select name="nilai[]" class="form-control" id="{{ $key->id }}"
                                                    required>
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($sub_kriteria as $subs_kriteria)
                                                    <option value="{{ $subs_kriteria->id }}">{{
                                                        $subs_kriteria->deskripsi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                    class="fa fa-times"></i> Batal</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$keys->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit
                                            Penilaian</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <form action="/update_penilaian" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            @foreach ($kriteria as $key)
                                            @php
                                            $sub_kriteria =
                                            \App\Models\Management\DataPenilaian::data_sub_kriteria($key->id);
                                            $s_option = \App\Models\Management\DataPenilaian::data_penilaian($keys->id,
                                            $key->id);
                                            @endphp
                                            @if ($sub_kriteria != null)
                                            @php
                                            $s_option = \App\Models\Management\DataPenilaian::data_penilaian($keys->id,
                                            $key->id);
                                            $selected_value = isset($s_option['nilai']) ? $s_option['nilai'] : null;
                                            @endphp
                                            <input type="text" name="id_data_alternatif" value="{{ $keys->id }}" hidden>
                                            <input type="text" name="id_data_kriteria[]" value="{{ $key->id }}" hidden>
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="{{ $key->id }}">{{ $key->keterangan
                                                    }}</label>
                                                <select name="nilai[]" class="form-control" id="{{ $key->id }}"
                                                    required>
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($sub_kriteria as $subs_kriteria)
                                                    <option value="{{ $subs_kriteria->id }}" @if($subs_kriteria->id ==
                                                        $selected_value) selected @endif>{{ $subs_kriteria->deskripsi }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            @endforeach
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




                        @php $no++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>