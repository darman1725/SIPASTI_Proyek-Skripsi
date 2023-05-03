<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-ui-checks-grid"></i> Data Kegiatan</h1>
        @if(Auth::user()->level == 'admin')
        <a href="{{ route('kegiatan.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Kegiatan
        </a>
        @endif
    </div>
    <div class="container">
        <div class="row">
            @foreach ($kegiatans as $kegiatan)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/kegiatan/'.$kegiatan->gambar) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $kegiatan->nama }}</h5>
                        <p class="card-text text-center">
                            <strong>Jenis: </strong>
                            @if ($kegiatan->jenis == 'Lapangan')
                            <span class="badge bg-info text-white">Lapangan</span>
                            @elseif ($kegiatan->jenis == 'Pengolahan')
                            <span class="badge bg-primary text-white">Pengolahan</span>
                            @else
                            {{ $kegiatan->jenis }}
                            @endif
                        </p>
                        <p class="card-text text-center">
                            <strong>Level: </strong>
                            @if ($kegiatan->level == 'Umum')
                              <span class="badge bg-light text-success border border-success">Umum</span>
                            @elseif ($kegiatan->level == 'Provinsi')
                              <span class="badge bg-light text-primary border border-primary">Provinsi</span>
                            @elseif ($kegiatan->level == 'Kabupaten/Kota')
                              <span class="badge bg-light text-secondary border border-secondary">Kabupaten/Kota</span>
                            @else
                              {{ $kegiatan->level }}
                            @endif
                          </p>                          
                        <hr>
                        <p class="card-text text-center"><strong>Tanggal mulai:</strong> {{ date('d-m-Y',
                            strtotime($kegiatan->tanggal_mulai)) }}</p>
                        <p class="card-text text-center"><strong>Tanggal akhir:</strong> {{ date('d-m-Y',
                            strtotime($kegiatan->tanggal_selesai)) }}</p>
                        <div class="d-flex justify-content-center">
                            @if(Auth::user()->level == 'admin')
                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-primary mr-1">Edit</a>
                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-1"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data kegiatan ini ?')">Hapus</button>
                            </form>
                            @endif
                        </div>
                        <hr>
                        @if(Auth::user()->level == 'admin')
                        <!-- Tombol daftar dihilangkan jika level auth adalah admin -->
                        @else
                        <a href="{{ route('pendaftaran') }}" class="btn btn-primary btn-block">Daftar</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>