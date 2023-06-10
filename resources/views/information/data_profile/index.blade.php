<x-app-layout>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="bi bi-person-square"></i> Data Profile</h4>
            </div>
            <div class="card-body">
                <!-- Navbar -->
                <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="infoTab" data-toggle="tab" href="#info" role="tab"
                            aria-controls="info" aria-selected="true"><i class="bi bi-info-circle-fill"></i>
                            Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="experienceTab" data-toggle="tab" href="#experience" role="tab"
                            aria-controls="experience" aria-selected="false"> <i class="bi bi-journal-medical"></i>
                            Pengalaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="photoTab" data-toggle="tab" href="#photo" role="tab"
                            aria-controls="photo" aria-selected="false"><i class="bi bi-card-image"></i> Dokumen</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content mt-3">
                    <!-- Informasi Tab -->
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="infoTab">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Informasi Pengguna</h5>
                                <hr style="margin-top: 0;">
                                <p><strong>Nama Lengkap:</strong> {{ $user->nama_lengkap }}</p>
                                <p><strong>NIK:</strong> {{ $user->nik }}</p>
                                <p><strong>Username:</strong> {{ $user->username }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Nomor NPWP:</strong> {{ $user->npwp }}</p>
                                <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
                                <p><strong>Tanggal Lahir:</strong> {{
                                    \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Informasi Tambahan</h5>
                                <hr style="margin-top: 0;">
                                <p><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}</p>
                                <p><strong>Agama:</strong> {{ $user->agama }}</p>
                                <p><strong>Status Perkawinan:</strong> {{ $user->status_perkawinan }}</p>
                                <p><strong>Pendidikan Terakhir:</strong> {{ $user->pendidikan_terakhir }}</p>
                                <p><strong>Nomor Handphone:</strong> {{ $user->no_handphone }}</p>
                                <p><strong>Pekerjaan:</strong> {{ $user->pekerjaan }}</p>
                                <p><strong>Catatan:</strong> {{ $user->catatan }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pengalaman Tab -->
                    <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experienceTab">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Pengalaman</h5>
                                <ul>
                                    @php
                                    $experiences = explode(',', $user->pengalaman);
                                    @endphp
                                    @foreach($experiences as $experience)
                                    <li>{{ trim($experience) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Foto Tab -->
                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photoTab">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="pas_foto">Pas Foto</label><br>
                                @if ($user->pas_foto)
                                <img src="{{ asset('storage/' . $user->pas_foto) }}" alt="Pas Foto" width="185"
                                    height="250">
                                @else
                                <p>Belum ada foto yang diunggah</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="foto_ktp">Foto KTP</label><br>
                                @if ($user->foto_ktp)
                                <img src="{{ asset('storage/' . $user->foto_ktp) }}" alt="Foto KTP" width="400"
                                    height="250">
                                @else
                                <p>Belum ada foto yang diunggah</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('data_profile.edit') }}" class="btn btn-primary">Edit Data</a>
            </div>
        </div>
    </section>
</x-app-layout>