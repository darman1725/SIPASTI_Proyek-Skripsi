<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Tambah Data</a>
                </div>
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Kegiatan</h1><br><br>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($kegiatans as $kegiatan)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('storage/gambar/'.$kegiatan->gambar) }}" class="card-img-top img-fluid"
                                alt="{{ $kegiatan->nama }}" style="object-fit: cover; height: 300px">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center">{{ $kegiatan->nama }}</h5>
                                <p class="card-text" style="text-align: center">{{ $kegiatan->deskripsi }}</p>
                                <div style="text-align: center;">
                                    <small class="text-muted">Tanggal mulai : {{ date('d-m-Y',
                                        strtotime($kegiatan->tanggal_mulai)) }} <br> Tanggal berakhir : {{
                                        date('d-m-Y', strtotime($kegiatan->tanggal_akhir)) }} Kriteria seleksi : {{
                                        $kegiatan->getKriteria->keterangan }}</small>
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <div class="btn-group" role="group">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                            href="{{ route('kegiatan.edit', $kegiatan) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <div class="ml-2">
                                            <form action="{{route('kegiatan.destroy', $kegiatan)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data kriteria ini ?')"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>