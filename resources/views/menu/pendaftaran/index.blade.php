<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-ui-checks"></i> Riwayat Pendaftaran</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Pendaftaran Kegiatan</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr style="text-align: center">
                            <th width="5%">No</th>
                            <th>Kegiatan</th>
                            <th>Tanggal Daftar</th>
                            <th>Posisi Sekarang</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $nomor = 1;
                        @endphp
                        @foreach($pendaftarans as $pendaftaran)
                        @if(Auth::user()->level == 'admin' || Auth::user()->id == $pendaftaran->id_data_user)
                        <tr style="text-align: center">
                            <td>{{ $nomor }}</td>
                            <td>{{ $pendaftaran->kegiatan->nama }} - {{ $pendaftaran->kegiatan->jenis }}</td>
                            <td>{{ $pendaftaran->updated_at->locale('id')->translatedFormat('l, d F Y, (H:i') }} WIB)
                            </td>
                            <td>{{ ucwords(strtolower($pendaftaran->provinsi)) }}, {{
                                ucwords(strtolower($pendaftaran->kabupaten_kota)) }}, {{
                                ucwords(strtolower($pendaftaran->kecamatan)) }}</td>
                            <td>
                                @php
                                $penilaian = App\Models\Management\DataPenilaian::where('id_pendaftaran',
                                $pendaftaran->id)->first();
                                $status = $penilaian ?
                                '<span class="badge bg-success text-white">Sudah Dinilai</span>' :
                                '<span class="badge bg-danger text-white">Belum Dinilai</span>';
                                @endphp
                                {!! $status !!}
                            </td>
                            <td>
                                @if(Auth::user()->level == 'admin' || Auth::user()->id == $pendaftaran->id_data_user)
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}"
                                        class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom"
                                        title="Detail Pendaftaran"><i class="fa fa-eye"></i></a>
                                    @if(!$penilaian)
                                    <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}"
                                        class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom"
                                        title="Edit Pendaftaran"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Hapus Pendaftaran"
                                            onclick="return confirm('Apakah Anda yakin ingin mengundurkan diri dari kegiatan ini?')">Mundur</button>
                                    </form>
                                    @endif
                                </div>
                                @endif
                            </td>
                        </tr>
                        @php
                        $nomor++;
                        @endphp
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>