<x-app-layout>
    <!-- Header section -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-info-circle-fill"></i> Edit Berita Statistik</h1>
        <a href="{{ route('berita') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <!-- Card section -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Berita</h6>
        </div>

        <div class="card-body">
            <!-- Form section -->
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
                        id="update-form">
                        @csrf
                        @method('PUT')

                        <!-- Judul field -->
                        <div class="form-group">
                            <label class="font-weight-bold">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul }}"
                                required>
                        </div>

                        <!-- Kategori field -->
                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">-- Pilih kategori kegiatan --</option>
                                <option value="Sosial dan Kependudukan" {{ old('kategori', $berita->kategori) ===
                                    strval('Sosial dan Kependudukan') ? 'selected' : '' }}>Sosial dan Kependudukan
                                </option>
                                <option value="Ekonomi dan Perdagangan" {{ old('kategori', $berita->kategori) ===
                                    strval('Ekonomi dan Perdagangan') ? 'selected' : '' }}>Ekonomi dan Perdagangan
                                </option>
                                <option value="Pertanian dan Pertambangan" {{ old('kategori', $berita->kategori) ===
                                    strval('Pertanian dan Pertambangan') ? 'selected' : '' }}>Pertanian dan Pertambangan
                                </option>
                                <option value="Pengumuman Resmi" {{ old('kategori', $berita->kategori) ===
                                    strval('Pengumuman Resmi') ? 'selected' : '' }}>Pengumuman Resmi</option>
                                <option value="Lainnya" {{ old('kategori', $berita->kategori) === strval('Lainnya') ?
                                    'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <!-- Tanggal Publikasi field -->
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Publikasi</label>
                            <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="form-control"
                                value="{{ $berita->tanggal_publikasi }}" required>
                        </div>

                        <!-- Isi field -->
                        <div class="form-group">
                            <label class="font-weight-bold">Isi</label>
                            <textarea name="isi" id="isi" rows="5" class="form-control"
                                required>{{ $berita->isi }}</textarea>
                        </div>

                        <!-- Card footer section -->
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-primary"
                                onclick="swalConfirmUpdate('{{ __('Apakah Anda yakin ingin menyimpan perubahan data berita ini?') }}', '{{ __('Data Berita berhasil diperbarui') }}', '{{ route('berita') }}')">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <button type="reset" class="btn btn-info">
                                <i class="fa fa-sync-alt"></i> Reset
                            </button>
                        </div>

                </div>
                <div class="col-md-6">
                    <!-- File field -->
                    <div class="form-group">
                        <label class="font-weight-bold">File</label><br>
                        <input type="file" name="file" id="file" class="form-control-file"
                            accept=".pdf,.mp4,.jpg,.jpeg,.png">
                        </form>
                        @if ($berita->file)
                        <div class="mt-3">
                            @php
                            $fileExtension = pathinfo($berita->file, PATHINFO_EXTENSION);
                            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                            $videoExtensions = ['mp4', 'mov', 'avi'];
                            $documentExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
                            @endphp

                            @if (in_array($fileExtension, $imageExtensions))
                            <img src="{{ asset('storage/berita/'.$berita->file) }}" alt="Preview" class="img-fluid">
                            @elseif (in_array($fileExtension, $videoExtensions))
                            <video controls>
                                <source src="{{ asset('storage/berita/'.$berita->file) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @elseif (in_array($fileExtension, $documentExtensions))
                            <iframe src="{{ asset('storage/berita/'.$berita->file) }}" width="100%"
                                height="375px"></iframe>
                            @else
                            <a href="{{ asset('storage/berita/'.$berita->file) }}" target="_blank">{{ $berita->file
                                }}</a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>