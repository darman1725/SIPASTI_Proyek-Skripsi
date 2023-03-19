<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Sub Kriteria</h1>
    </div>

    <?php if ($data_kriteria==NULL): ?>
    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Sub Kriteria</h6>
        </div>

        <div class="card-body">
            <div class="alert alert-info">
                Data masih kosong.
            </div>
        </div>
    </div>
    <?php endif ?>

    <?php foreach ($data_kriteria as $dk): ?>
    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i>
                    <?= $dk->keterangan." (".$dk->kode_kriteria.")" ?>
                </h6>
                <a href="#tambah{{$dk->id_kriteria}}" data-toggle="modal" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>

        <div class="modal fade" id="tambah{{ $dk->id_kriteria }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah {{ $dk->keterangan
                            }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="{{ route('data_sub_kriteria.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id_kriteria" value="{{ $dk->id_kriteria }}">
                            <div class="form-group">
                                <label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
                                <input type="text" id="deskripsi" class="form-control" name="deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label for="nilai" class="font-weight-bold">Nilai</label>
                                <input type="text" id="nilai" name="nilai" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                    class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Nama Sub Kriteria</th>
                            <th>Nilai</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // $sub_kriteria1 = $this->Sub_Kriteria_model->data_sub_kriteria($dk->id_kriteria);
                        $sub_kriteria1 = (new App\Models\Menu\DataSubKriteria())->data_sub_kriteria($dk->id_kriteria);
						$no=1;
						foreach ($sub_kriteria1 as $dk):
					?>
                        <tr align="center">
                            <td>
                                <?=$no ?>
                            </td>
                            <td align="left">
                                <?= $dk['deskripsi'] ?>
                            </td>
                            <td>
                                <?= $dk['nilai'] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                        href="{{ route('data_kriteria.edit', $dk->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <div class="ml-2">
                                        <form action="{{route('data_kriteria.destroy', $dk->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data kriteria ini ?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="editsk{{ $dk['id_sub_kriteria'] }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit {{
                                            $dk['deskripsi'] }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <form method="post"
                                        action="{{ route('sub_kriteria.update', $dk['id_sub_kriteria']) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <input type="hidden" name="id_data_kriteria"
                                                value="{{ $dk['id_data_kriteria'] }}">
                                            <div class="form-group">
                                                <label for="deskripsi" class="font-weight-bold">Nama Sub
                                                    Kriteria</label>
                                                <input type="text" id="deskripsi" autocomplete="off"
                                                    class="form-control" value="{{ $dk['deskripsi'] }}" name="deskripsi"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nilai" class="font-weight-bold">Nilai</label>
                                                <input type="text" autocomplete="off" id="nilai" name="nilai"
                                                    class="form-control" value="{{ $dk['nilai'] }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                    class="fa fa-times"></i> Batal</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
					$no++;
					endforeach
				?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php endforeach ?>

</x-app-layout>