<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-person-check"></i> Data Pelamar</h1>
        <a href="{{ route('user.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">{{ __('NIK') }}</th>
                                <th scope="col">{{ __('Nama Lengkap') }}</th>
                                <th scope="col">{{ __('Username') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Level') }}</th>
                                <th scope="col">{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach($users as $user)
                            @if($user->level == 'user')
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->nama_lengkap }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __('Aksi') }}">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary"><i
                                                class="fa fa-eye"></i></a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah ada yakin ingin menghapus data user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>