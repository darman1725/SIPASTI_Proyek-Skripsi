<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-ui-checks-grid"></i> Data Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Kegiatan
        </a>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($kegiatans as $kegiatan)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/kegiatan/'.$kegiatan->gambar) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $kegiatan->nama }}</h5>
                            <p class="card-text text-center">{{ $kegiatan->deskripsi }}</p>
                            <hr>
                            <p class="card-text"><strong>Tanggal mulai:</strong> {{ date('d-m-Y', strtotime($kegiatan->tanggal_mulai)) }}</p>
                            <p class="card-text"><strong>Tanggal akhir:</strong> {{ date('d-m-Y', strtotime($kegiatan->tanggal_selesai)) }}</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-primary mr-1">Edit</a>
                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-1">Delete</button>
                                </form>
                            </div>                            
                            <hr>
                            <a href="#" class="btn btn-primary btn-block">Daftar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>