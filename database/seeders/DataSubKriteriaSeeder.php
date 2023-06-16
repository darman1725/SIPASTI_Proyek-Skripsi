<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu\DataSubKriteria;
use Illuminate\Support\Facades\DB;

class DataSubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $dataSubKriteria = [
        // Data sub kriteria dari REG 1 - Status perkawinan
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 1,
            'deskripsi' => 'Belum Kawin',
            'nilai' => 70,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 1,
            'deskripsi' => 'Cerai Mati',
            'nilai' => 80,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 1,
            'deskripsi' => 'Cerai Hidup',
            'nilai' => 90,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 1,
            'deskripsi' => 'Kawin',
            'nilai' => 100,
        ],

        // Data sub kriteria dari REG 2 - Pendidikan
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 2,
            'deskripsi' => 'S2',
            'nilai' => 100,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 2,
            'deskripsi' => 'D4/S1',
            'nilai' => 95,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 2,
            'deskripsi' => 'D1/D2/D3',
            'nilai' => 90,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 2,
            'deskripsi' => 'SMA',
            'nilai' => 85,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 2,
            'deskripsi' => 'SMP',
            'nilai' => 80,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 2,
            'deskripsi' => 'SD',
            'nilai' => 75,
        ],

        // Data sub kriteria dari REG 3 - Pekerjaan
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Kader PKK/Karang Taruna',
            'nilai' => 70,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Aparat Desa/Kelurahan',
            'nilai' => 75,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Mengurus Rumah Tangga',
            'nilai' => 80,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Pelajar/Mahasiswa',
            'nilai' => 85,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Wiraswasta',
            'nilai' => 90,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Pegawai/Guru Honorer',
            'nilai' => 95,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 3,
            'deskripsi' => 'Lainnya',
            'nilai' => 100,
        ],

        // Data sub kriteria dari REG 4 - Pengalaman
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '6 Survei',
            'nilai' => 100,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '5 Survei',
            'nilai' => 95,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '4 Survei',
            'nilai' => 90,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '3 Survei',
            'nilai' => 85,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '2 Survei',
            'nilai' => 80,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '1 Survei',
            'nilai' => 75,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 4,
            'deskripsi' => '0 Survei',
            'nilai' => 70,
        ],

        // Data sub kriteria dari REG 5 - Kepemilikan Gadget
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 5,
            'deskripsi' => 'Ada',
            'nilai' => 75,
        ],
        [
            'id_data_kegiatan' => 1,
            'id_data_kriteria' => 5,
            'deskripsi' => 'Tidak Ada',
            'nilai' => 100,
        ],
    ];

    foreach ($dataSubKriteria as $data) {
        DataSubKriteria::create($data);
    }
}
}
