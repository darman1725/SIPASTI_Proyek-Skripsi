<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Kegiatan</div>

                    <div class="card-body">
                        <form action="{{ route('kegiatan.update', $kegiatan) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama Kegiatan</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $kegiatan->nama) }}" required>

                                @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror" rows="5"
                                    required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>

                                @error('deskripsi')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar"
                                    class="form-control-file @error('gambar') is-invalid @enderror" accept="image/*">
                                @error('gambar')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($kegiatan->gambar)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/gambar/' . $kegiatan->gambar) }}"
                                        alt="{{ $kegiatan->nama }}" class="img-thumbnail my-3"
                                        style="max-width: 200px;">
                                    <div>{{ $kegiatan->gambar }}</div>
                                </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai) }}" required>

                                @error('tanggal_mulai')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                    class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                    value="{{ old('tanggal_akhir', $kegiatan->tanggal_akhir) }}" required>

                                @error('tanggal_akhir')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="data_kriteria" class="col-md-4 col-form-label text-md-right">{{ __('Data
                                    Kriteria') }}</label>
                                <div class="col-md-6">
                                    @foreach($dataKriterias as $dataKriteria)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="data_kriteria[]"
                                            value="{{ $dataKriteria->id }}" id="{{ $dataKriteria->id }}"
                                            @if(isset($selectedKriteria) && in_array($dataKriteria->id,
                                        $selectedKriteria))
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="{{ $dataKriteria->id }}">
                                            {{ $dataKriteria->keterangan }}
                                        </label>
                                    </div>
                                    @endforeach
                                    @error('data_kriteria')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>