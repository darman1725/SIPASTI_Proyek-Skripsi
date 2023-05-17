<!-- index.blade.php -->
<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-person-check"></i> Data Pelamar</h1>
        <a href="{{ route('user.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Pelamar</h6>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('user.bulkDelete') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr style="text-align: center">
                                <th width="5%">No</th>
                                <th width="5%"><input type="checkbox" id="checkAll"></th>
                                <th>{{ __('Nama Lengkap') }}</th>
                                <th>{{ __('Username') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Level') }}</th>
                                <th width="15%">{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach($users as $user)
                                @if($user->level == 'user')
                                    <tr style="text-align: center">
                                        <td>{{ $no++ }}</td>
                                        <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}"></td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm"><i
                                                        class="fa fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')">Hapus Terpilih</button>
                </div>
            </form>
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
</x-app-layout>