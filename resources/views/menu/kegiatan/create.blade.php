<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Kegiatan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kegiatan')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi')
                                    }}</label>

                                <div class="col-md-6">
                                    <textarea id="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                        required>{{ old('deskripsi') }}</textarea>

                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('Gambar')
                                    }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="gambar"
                                        class="form-control-file @error('gambar') is-invalid @enderror" id="gambar">

                                    @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggal_mulai" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal
                                    Mulai') }}</label>

                                <div class="col-md-6">
                                    <input id="tanggal_mulai" type="date"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>

                                    @error('tanggal_mulai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggal_akhir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal
                                    Akhir') }}</label>

                                <div class="col-md-6">
                                    <input id="tanggal_akhir" type="date"
                                        class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                        name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required
                                        autocomplete="tanggal_akhir" autofocus>

                                    @error('tanggal_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_kriteria" class="col-md-4 col-form-label text-md-right">{{ __('Data
                                    Kriteria') }}</label>

                                <div class="col-md-6">
                                    @foreach($dataKriterias as $dataKriteria)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="data_kriteria[]"
                                            value="{{ $dataKriteria->id }}" id="{{ $dataKriteria->id }}" {{
                                            in_array($dataKriteria->id, old('data_kriteria') ?: []) ? 'checked' : '' }}>

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
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>