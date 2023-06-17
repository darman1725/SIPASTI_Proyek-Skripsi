<x-app-layout>
    <section class="section">
        <div class="page-heading">
            <h3><i class="bi bi-speedometer"></i> Dashboard - Ringkasan Statistik</h3>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stats-icon purple">
                                <i class="iconly-boldShow"></i>
                            </div>
                            <h6 class="text-muted font-semibold">Kegiatan</h6>
                            <h6 class="font-extrabold mb-0">{{ $jumlahKegiatan }} Kegiatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                            <h6 class="text-muted font-semibold">Diikuti</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalPendaftaran }} Kegiatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stats-icon green">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                            <h6 class="text-muted font-semibold">Sudah Dinilai</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalSudahDinilai }} Kegiatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                            <h6 class="text-muted font-semibold">Belum Dinilai</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalBelumDinilai }} Kegiatan</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card p-3 bg-white">
                            <h2 style="text-align: center; color: #111">Rekrutmen Mitra</h2>
                            <p style="text-align: justify; color: #333">Sesuai amanat Undang-Undang Nomor 16 Tahun 1997 tentang Statistik dan
                                Peraturan Pemerintah Nomor 51 Tahun 1999 tentang Penyelenggaraan Statistik, Badan Pusat Statistik 
                                (BPS) menyelenggarakan kegiatan sensus dan survei secara rutin. Salah satu tahapan penting dalam 
                                pelaksanaan kegiatan sensus dan survei adalah rekruitment mitra/petugas.<br><br>
                                Rekrutmen mitra/petugas harus direncanakan dan dilaksanakan dengan sungguh-sungguh dan saksama
                                agar diperoleh petugas yang bertanggung jawab, disiplin, ulet, dan teliti. Untuk itu, 
                                rekrutmen petugas statistik menjadi perhatian utama BPS Kota Malang.</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card p-3 bg-white">
                            <h2 style="text-align: center; color: #111">Kilas Kegiatan</h2>
                            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#imageCarousel" data-slide-to="1"></li>
                                    <li data-target="#imageCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/faces/1.jpg') }}" class="d-block w-100" alt="Gambar 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/faces/2.jpg') }}" class="d-block w-100" alt="Gambar 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/faces/3.jpg') }}" class="d-block w-100" alt="Gambar 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="bi bi-newspaper"></i>  Berita Terkini</h4>
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($beritas as $berita)
                                <div class="col-md-12 mb-2">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                @php
                                                $fileExtension = pathinfo($berita->file, PATHINFO_EXTENSION);
                                                @endphp
                                                @if($fileExtension === 'pdf')
                                                <embed src="{{ asset('storage/berita/'.$berita->file) }}" type="application/pdf"
                                                    class="card-img" alt="Berita Image" width="500" height="235">
                                                @elseif($fileExtension === 'mp4')
                                                <video class="card-img" controls width="100%">
                                                    <source src="{{ asset('storage/berita/'.$berita->file) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                @else
                                                <img src="{{ asset('storage/berita/'.$berita->file) }}" class="card-img" alt="Berita Image"
                                                    style="width:295px; height: 235px;">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <p>
                                                        <span class="badge 
                                                            @if($berita->kategori == 'Sosial dan Kependudukan')
                                                            bg-danger text-white
                                                            @elseif($berita->kategori == 'Ekonomi dan Perdagangan')
                                                            bg-success text-white
                                                            @elseif($berita->kategori == 'Pertanian dan Pertambangan')
                                                            bg-warning text-white
                                                            @elseif($berita->kategori == 'Pengumuman Resmi')
                                                            bg-primary text-white
                                                            @else
                                                            bg-secondary text-white
                                                            @endif">
                                                            {{ $berita->kategori }}
                                                        </span>
                                                    </p>
                                                    <h5 class="card-title">{{ $berita->judul }}</h5>
                                                    <p class="card-text">{{ Str::limit($berita->isi, 125, '...') }}</p>
                                                    <p class="float-right">{{
                                                        \Carbon\Carbon::parse($berita->tanggal_publikasi)->locale('id')->isoFormat('dddd,
                                                        D MMMM Y') }}</p>
                                                    <div class="d-flex justify-content-end">
                                                        <div>
                                                            @if(Auth::user()->level == 'admin')
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Edit Berita"
                                                                href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <button data-toggle="modal" data-placement="bottom" title="Hapus Berita"
                                                                class="btn btn-danger ml-1"
                                                                onclick="swalConfirmDelete({{ $berita->id }}, 'Apakah Anda yakin ingin menghapus data berita ini?', 'Data berita berhasil dihapus');"><i
                                                                    class="fa fa-trash"></i></button>
                                                            @endif
                                                            <button data-toggle="modal" data-placement="bottom" title="Lihat Selengkapnya"
                                                                class="btn btn-info ml-1" data-target="#detailModal{{ $berita->id }}"><i
                                                                    class="fa fa-info-circle"></i></button>
                                                        </div>
                                                    </div>
                                                    <form id="destroy-form-{{ $berita->id }}"
                                                        action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Detail Modal -->
                                <div class="modal fade" id="detailModal{{ $berita->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="detailModalLabel{{ $berita->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title mx-auto" id="detailModalLabel{{ $berita->id }}">{{
                                                    $berita->judul }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Kategori: </strong>
                                                            <span class="badge 
                                                            @if($berita->kategori == 'Sosial dan Kependudukan')
                                                            bg-danger text-white
                                                            @elseif($berita->kategori == 'Ekonomi dan Perdagangan')
                                                            bg-success text-white
                                                            @elseif($berita->kategori == 'Pertanian dan Pertambangan')
                                                            bg-warning text-white
                                                            @elseif($berita->kategori == 'Pengumuman Resmi')
                                                            bg-primary text-white
                                                            @else
                                                            bg-secondary text-white
                                                            @endif">
                                                                {{ $berita->kategori }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <p><strong>Tanggal Publikasi: </strong>
                                                            {{
                                                            \Carbon\Carbon::parse($berita->tanggal_publikasi)->locale('id')->isoFormat('dddd,
                                                            D MMMM Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                @php
                                                $fileExtension = pathinfo($berita->file, PATHINFO_EXTENSION);
                                                @endphp
                                                @if($fileExtension === 'pdf')
                                                <p><strong></strong><br><embed src="{{ asset('storage/berita/'.$berita->file) }}"
                                                        type="application/pdf" width="100%" height="600px"></p>
                                                @elseif($fileExtension === 'mp4')
                                                <p><strong></strong><br>
                                                    <video controls width="100%" height="auto">
                                                        <source src="{{ asset('storage/berita/'.$berita->file) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </p>
                                                @else
                                                <p><strong></strong><br><img src="{{ asset('storage/berita/'.$berita->file) }}"
                                                        class="img-fluid" width="100%"></p>
                                                @endif
                                                <p><strong></strong>{{ $berita->isi }}</p>
                                                <!-- tambahkan detail lainnya sesuai kebutuhan -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Detail Modal -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 20 // Waktu dalam milidetik antara pergantian gambar
            });
        });
    </script>
    @endpush
</x-app-layout>
