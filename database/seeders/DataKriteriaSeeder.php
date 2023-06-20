<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu\DataKriteria;
use Illuminate\Support\Facades\DB;

class DataKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat kriteria pada data kegiatan Regsosek 2023
        $dataKriteria = [
            [
                'id_data_kegiatan' => 1,
                'keterangan' => 'Status Perkawinan',
                'kode_kriteria' => 'REG-1',
                'bobot' => 10,
                'jenis' => 'Cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_data_kegiatan' => 1,
                'keterangan' => 'Pendidikan',
                'kode_kriteria' => 'REG-2',
                'bobot' => 20,
                'jenis' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_data_kegiatan' => 1,
                'keterangan' => 'Pekerjaan',
                'kode_kriteria' => 'REG-3',
                'bobot' => 25,
                'jenis' => 'Cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_data_kegiatan' => 1,
                'keterangan' => 'Pengalaman',
                'kode_kriteria' => 'REG-4',
                'bobot' => 30,
                'jenis' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_data_kegiatan' => 1,
                'keterangan' => 'Kepemilikian Gadget',
                'kode_kriteria' => 'REG-5',
                'bobot' => 15,
                'jenis' => 'Cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('data_kriteria')->insert($dataKriteria);
    }
}
