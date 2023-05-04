<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-journal-bookmark"></i> Riwayat Pendaftaran</h1>
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Daftarkan diri
        </a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">Data Pendaftaran Kegiatan</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Daerah Pelaksanaan</th>
                            <th>Kegiatan</th>
                            <th>Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftarans as $pendaftaran)
                        @if(Auth::user()->level == 'admin' || Auth::user()->id == $pendaftaran->id_data_user)
                        <tr style="text-align: center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords(strtolower($pendaftaran->provinsi)) }},
                                {{ ucwords(strtolower($pendaftaran->kabupaten_kota)) }},
                                {{ ucwords(strtolower($pendaftaran->kecamatan)) }}</td>
                            <td>{{ $pendaftaran->kegiatan->nama }}</td>
                            <td>{{ $pendaftaran->kegiatan->jenis }}</td>
                            <td>
                                @if(Auth::user()->level == 'admin' || Auth::user()->id == $pendaftaran->id_data_user)
                                <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}"
                                    class="btn btn-sm btn-info">Show</a>
                                <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran ini?')">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>