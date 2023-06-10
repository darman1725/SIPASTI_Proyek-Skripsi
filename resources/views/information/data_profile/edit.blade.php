<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-info-circle-fill"></i> Edit Berita Statistik</h1>
        <a href="{{ route('data_profile') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('data_profile.update') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="tab" id="tab-1">
                        <h5>Step 1: Informasi Personal</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control"
                                        value="{{ $user->nama_lengkap }}" placeholder="Silahkan isi nama Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ $user->username }}" placeholder="Silahkan isi username Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="npwp">NPWP (optional)</label>
                                    <input type="text" id="npwp" name="npwp" class="form-control"
                                        value="{{ $user->npwp }}" placeholder="Silahkan isi nomor NPWP Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                                        value="{{ $user->tanggal_lahir }}"
                                        placeholder="Silahkan isi tanggal lahir Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select id="agama" name="agama" class="form-control">
                                        <option value="">-- Pilih jenis agama --</option>
                                        <option value="Islam" {{ $user->agama === 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ $user->agama === 'Kristen' ? 'selected' : ''
                                            }}>Kristen</option>
                                        <option value="Katolik" {{ $user->agama === 'Katolik' ? 'selected' : ''
                                            }}>Katolik</option>
                                        <option value="Hindu" {{ $user->agama === 'Hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Budha" {{ $user->agama === 'Budha' ? 'selected' : '' }}>Budha
                                        </option>
                                        <option value="Konghucu" {{ $user->agama === 'Konghucu' ? 'selected' : ''
                                            }}>Konghucu</option>
                                        <option value="Lainnya" {{ $user->agama === 'Lainnya' ? 'selected' : ''
                                            }}>Lainnya</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control">
                                        <option value="">-- Pilih jenis pendidikan --</option>
                                        <option value="SD/Sederajat ke bawah" {{ $user->pendidikan_terakhir ===
                                            'SD/Sederajat ke bawah' ? 'selected' : '' }}>SD/Sederajat ke bawah</option>
                                        <option value="Tamat SMP/Sederajat" {{ $user->pendidikan_terakhir === 'Tamat
                                            SMP/Sederajat' ? 'selected' : '' }}>Tamat SMP/Sederajat</option>
                                        <option value="Tamat SMA/Sederajat" {{ $user->pendidikan_terakhir === 'Tamat
                                            SMA/Sederajat' ? 'selected' : '' }}>Tamat SMA/Sederajat</option>
                                        <option value="Tamat D1/D2/D3" {{ $user->pendidikan_terakhir === 'Tamat
                                            D1/D2/D3' ? 'selected' : '' }}>Tamat D1/D2/D3</option>
                                        <option value="Tamat D4/S1" {{ $user->pendidikan_terakhir === 'Tamat D4/S1' ?
                                            'selected' : '' }}>Tamat D4/S1</option>
                                        <option value="Tamat S2" {{ $user->pendidikan_terakhir === 'Tamat S2' ?
                                            'selected' : '' }}>Tamat S2</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <select id="pekerjaan" name="pekerjaan" class="form-control">
                                        <option value="">-- Pilih jenis pekerjaan --</option>
                                        <option value="Aparat Desa/Kelurahan" {{ $user->pekerjaan === 'Aparat
                                            Desa/Kelurahan' ? 'selected' : '' }}>Aparat Desa/Kelurahan</option>
                                        <option value="Kader PKK/Karang Taruna" {{ $user->pekerjaan === 'Kader
                                            PKK/Karang Taruna' ? 'selected' : '' }}>Kader PKK/Karang Taruna</option>
                                        <option value="Pegawai/Guru Honorer" {{ $user->pekerjaan === 'Pegawai/Guru
                                            Honorer' ? 'selected' : '' }}>Pegawai/Guru Honorer</option>
                                        <option value="Mengurus Rumah Tangga" {{ $user->pekerjaan === 'Mengurus Rumah
                                            Tangga' ? 'selected' : '' }}>Mengurus Rumah Tangga</option>
                                        <option value="Wiraswasta" {{ $user->pekerjaan === 'Wiraswasta' ? 'selected' :
                                            '' }}>Wiraswasta</option>
                                        <option value="Pelajar/Mahasiswa" {{ $user->pekerjaan === 'Pelajar/Mahasiswa' ?
                                            'selected' : '' }}>Pelajar/Mahasiswa</option>
                                        <option value="Lainnya" {{ $user->pekerjaan === 'Lainnya' ? 'selected' : ''
                                            }}>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik" name="nik" class="form-control" value="{{ $user->nik }}"
                                        placeholder="Silahkan isi NIK Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $user->email }}" placeholder="Silahkan isi email Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat lengkap</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control"
                                        value="{{ $user->alamat }}" placeholder="Silahkan isi alamat Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                        <option value="">-- Pilih jenis kelamin --</option>
                                        <option value="Laki-laki" {{ $user->jenis_kelamin === 'Laki-laki' ? 'selected' :
                                            '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $user->jenis_kelamin === 'Perempuan' ? 'selected' :
                                            '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <select id="status_perkawinan" name="status_perkawinan" class="form-control">
                                        <option value="">-- Pilih status perkawinan --</option>
                                        <option value="Belum Kawin" {{ $user->status_perkawinan === 'Belum Kawin' ?
                                            'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ $user->status_perkawinan === 'Kawin' ? 'selected' : ''
                                            }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ $user->status_perkawinan === 'Cerai Hidup' ?
                                            'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ $user->status_perkawinan === 'Cerai Mati' ?
                                            'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_handphone">Nomor Handphone</label>
                                    <input type="text" id="no_handphone" name="no_handphone" class="form-control"
                                        value="{{ $user->no_handphone }}"
                                        placeholder="Silahkan isi no handphone Anda..." />
                                </div>

                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" id="catatan" name="catatan" class="form-control"
                                        value="{{ $user->catatan }}"
                                        placeholder="Silahkan isi catatan Anda. Jika tidak ada, beri tanda (-)" />
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="reset" class="btn btn-info reset-btn"><i class="fa fa-sync-alt"></i>
                                Reset</button>
                            <button type="button" class="btn btn-primary next-btn"><i
                                    class="bi bi-arrow-right-circle-fill"></i> Next</button>
                        </div>
                    </div>

                    <div class="tab" id="tab-2" style="display: none;">
                        <h5>Step 2: Pengalaman</h5>
                        <div class="form-group">
                            <label for="pengalaman">Pengalaman</label>
                            <div>
                                <input type="checkbox" id="sensus_penduduk" name="pengalaman[]" value="Sensus Penduduk"
                                    {{ in_array('Sensus Penduduk', old('pengalaman', explode(',', $user->pengalaman))) ?
                                'checked' : '' }}>
                                <label for="sensus_penduduk">Sensus Penduduk</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sensus_pertanian" name="pengalaman[]"
                                    value="Sensus Pertanian" {{ in_array('Sensus Pertanian', old('pengalaman',
                                    explode(',', $user->pengalaman))) ? 'checked' : '' }}>
                                <label for="sensus_pertanian">Sensus Pertanian</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sensus_ekonomi" name="pengalaman[]" value="Sensus Ekonomi" {{
                                    in_array('Sensus Ekonomi', old('pengalaman', explode(',', $user->pengalaman))) ?
                                'checked' : '' }}>
                                <label for="sensus_ekonomi">Sensus Ekonomi</label>
                            </div>
                            <div>
                                <input type="checkbox" id="susenas" name="pengalaman[]" value="Susenas" {{
                                    in_array('Susenas', old('pengalaman', explode(',', $user->pengalaman))) ? 'checked'
                                : '' }}>
                                <label for="susenas">Susenas</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sakernas" name="pengalaman[]" value="Sakernas" {{
                                    in_array('Sakernas', old('pengalaman', explode(',', $user->pengalaman))) ? 'checked'
                                : '' }}>
                                <label for="sakernas">Sakernas</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sbh" name="pengalaman[]" value="SBH" {{ in_array('SBH',
                                    old('pengalaman', explode(',', $user->pengalaman))) ? 'checked' : '' }}>
                                <label for="sbh">SBH</label>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-secondary prev-btn"> <i
                                    class="bi bi-arrow-left-circle-fill"></i> Previous</button>
                            <button type="reset" class="btn btn-info reset-btn"><i class="fa fa-sync-alt"></i>
                                Reset</button>
                            <button type="button" class="btn btn-primary next-btn"><i
                                    class="bi bi-arrow-right-circle-fill"></i> Next</button>
                        </div>
                    </div>

                    <div class="tab" id="tab-3" style="display: none;">
                        <h5>Step 3: Dokumen</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pas_foto">Pas Foto</label><br>
                                    @if ($user->pas_foto)
                                    <img src="{{ asset('storage/' . $user->pas_foto) }}" alt="Pas Foto" width="185"
                                        height="250">
                                    @else
                                    <p>Belum ada foto yang diunggah</p>
                                    @endif
                                    <br><br><input type="file" id="pas_foto" name="pas_foto" accept="image/*"
                                        class="form-control-file" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto_ktp">Foto KTP</label><br>
                                    @if ($user->foto_ktp)
                                    <img src="{{ asset('storage/' . $user->foto_ktp) }}" alt="Foto KTP" width="400"
                                        height="250">
                                    @else
                                    <p>Belum ada foto yang diunggah</p>
                                    @endif
                                    <br><br><input type="file" id="foto_ktp" name="foto_ktp" accept="image/*"
                                        class="form-control-file" />
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-secondary prev-btn">
                                <i class="bi bi-arrow-left-circle-fill"></i> Previous
                            </button>
                            <button type="reset" class="btn btn-info reset-btn">
                                <i class="fa fa-sync-alt"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>

                    <input type="hidden" id="current_step" name="current_step" value="1" />
                </form>
            </div>
        </div>
    </section>

    <script>
        // JavaScript code to handle the multi-step form
        const prevBtns = document.querySelectorAll('.prev-btn');
        const nextBtns = document.querySelectorAll('.next-btn');
        const resetBtn = document.getElementById('reset-btn');
        const tabs = document.querySelectorAll('.tab');

        // Hide all tabs except the first one
        function showTab(currentStep) {
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach((tab, index) => {
        if (index === currentStep - 1) {
            tab.style.display = 'block';
        } else {
            tab.style.display = 'none';
        }
        });
        }

        // Move to the next step
        function nextStep() {
            const currentStep = parseInt(document.getElementById('current_step').value);
            showTab(currentStep + 1);
            document.getElementById('current_step').value = currentStep + 1;
        }

        // Move to the previous step
        function prevStep() {
            const currentStep = parseInt(document.getElementById('current_step').value);
            showTab(currentStep - 1);
            document.getElementById('current_step').value = currentStep - 1;
        }

        // Reset the form
        function resetForm() {
            document.getElementById('current_step').value = 1;
            showTab(1);
            document.getElementById('edit-form').reset(); // Assuming you add an ID "edit-form" to the form element
        }

        // Add click event listeners to the buttons
        nextBtns.forEach((btn) => {
            btn.addEventListener('click', nextStep);
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener('click', prevStep);
        });

        resetBtn.addEventListener('click', resetForm);

        // Show the initial step
        showTab(1);
    </script>
</x-app-layout>