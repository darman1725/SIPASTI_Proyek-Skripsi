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
                            <span class="badge bg-success text-white">Lapangan</span>
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
                            <a data-toggle="tooltip" data-placement="bottom" title="Edit Kegiatan"
                                href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-primary mr-1"><i
                                    class="fa fa-edit"></i></a>
                            <button data-toggle="modal" data-placement="bottom" title="Detail Kegiatan"
                                class="btn btn-warning ml-1" data-target="#detailModal{{ $kegiatan->id }}">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button data-toggle="tooltip" data-placement="bottom" title="Hapus Kegiatan"
                                class="btn btn-danger ml-1"
                                onclick="swalConfirmDelete({{ $kegiatan->id }}, 'Apakah Anda yakin ingin menghapus data kegiatan ini?', 'Data kegiatan berhasil dihapus');"><i
                                    class="fa fa-trash"></i>
                            </button>
                            @endif
                        </div>
                        <form id="destroy-form-{{ $kegiatan->id }}"
                            action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <hr>
                        @if(Auth::user()->level == 'admin')
                        <!-- Tombol daftar dihilangkan jika level auth adalah admin -->
                        @else
                        @php
                        // Cek apakah user sudah terdaftar pada kegiatan ini
                        $isRegistered = $pendaftarans->contains('id_data_kegiatan', $kegiatan->id) &&
                        Auth::user()->pendaftaran->contains('id_data_kegiatan', $kegiatan->id);
                        @endphp
                        @if($isRegistered)
                        <button class="btn btn-success btn-block" style="margin-bottom: 10px;" disabled><i
                                class="fa fa-check"></i> Terdaftar</button>
                        <button class="btn btn-warning btn-block" data-toggle="modal"
                            data-target="#detailModal{{ $kegiatan->id }}">
                            <i class="fa fa-eye"></i> Detail
                        </button>
                        @else
                        <a href="{{ route('pendaftaran.create', ['id_data_kegiatan' => $kegiatan->id]) }}"
                            class="btn btn-primary btn-block" style="margin-bottom: 10px;"><i class="fa fa-edit"></i>
                            Daftar</a>
                        <button class="btn btn-warning btn-block" data-toggle="modal"
                            data-target="#detailModal{{ $kegiatan->id }}">
                            <i class="fa fa-eye"></i> Detail
                        </button>
                        @endif
                        @endif
                    </div>
                </div>
            </div>

            <!-- Detail Modal -->
            <div class="modal fade" id="detailModal{{ $kegiatan->id }}" tabindex="-1" role="dialog"
                aria-labelledby="detailModalLabel{{ $kegiatan->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $kegiatan->id }}">Detail Kegiatan: {{
                                $kegiatan->nama }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <strong>Jenis:</strong>
                                        @if ($kegiatan->jenis == 'Lapangan')
                                        <span class="badge bg-success text-white">Lapangan</span>
                                        @elseif ($kegiatan->jenis == 'Pengolahan')
                                        <span class="badge bg-primary text-white">Pengolahan</span>
                                        @else
                                        {{ $kegiatan->jenis }}
                                        @endif
                                    </div>
                                    <div>
                                        <strong>Tanggal Mulai :</strong> {{ date('d-m-Y',
                                        strtotime($kegiatan->tanggal_mulai)) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <strong>Level:</strong>
                                        @if ($kegiatan->level == 'Umum')
                                        <span class="badge bg-light text-success border border-success">Umum</span>
                                        @elseif ($kegiatan->level == 'Provinsi')
                                        <span class="badge bg-light text-primary border border-primary">Provinsi</span>
                                        @elseif ($kegiatan->level == 'Kabupaten/Kota')
                                        <span
                                            class="badge bg-light text-secondary border border-secondary">Kabupaten/Kota</span>
                                        @else
                                        {{ $kegiatan->level }}
                                        @endif
                                    </div>
                                    <div>
                                        <strong>Tanggal Selesai :</strong> {{ date('d-m-Y',
                                        strtotime($kegiatan->tanggal_selesai)) }}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <img src="{{ asset('storage/kegiatan/'.$kegiatan->gambar) }}" class="img-fluid mt-3"
                                alt="Gambar Kegiatan">
                            <div class="mt-3">
                                <strong>Deskripsi:</strong> {{ $kegiatan->detail_kegiatan }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>

@section('scripts')
<script>
    $(document).ready(function() {
            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
</script>
@endsection