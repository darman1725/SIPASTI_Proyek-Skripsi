<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-book"></i> Data Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="row">
        @foreach ($kegiatans as $kegiatan)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/gambar/'.$kegiatan->gambar) }}" class="card-img-top"
                    alt="{{ $kegiatan->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $kegiatan->nama }}</h5>
                    <p class="card-text">{{ $kegiatan->deskripsi }}</p>
                    <p class="card-text"><strong>Tanggal Mulai:</strong> {{ date('d-m-Y',
                        strtotime($kegiatan->tanggal_mulai)) }}</p>
                    <p class="card-text"><strong>Tanggal Akhir:</strong> {{ date('d-m-Y',
                        strtotime($kegiatan->tanggal_akhir)) }}</p>
                    <p class="card-text"><strong>Kriteria:</strong></p>
                    <ul class="card-text">
                        @php
                        $kriteriaArray = explode(',', $kegiatan->data_kriteria);
                        $dataKriterias = [];
                        foreach ($kriteriaArray as $kriteriaId) {
                        $kriteria = App\Models\Menu\DataKriteria::find($kriteriaId);
                        if ($kriteria) {
                        $dataKriterias[] = $kriteria->keterangan;
                        }
                        }
                        @endphp
                        @foreach ($dataKriterias as $kriteria)
                        <li>{{ $kriteria }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-primary"><i
                                class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data kegiatan ini ?')"><i
                                    class="fas fa-trash"></i>
                                Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>