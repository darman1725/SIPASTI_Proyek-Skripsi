<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu\DataKriteria;

class DataKriteriaSeeder extends Seeder
{
    public function run()
    {
        DataKriteria::create(
            [
                'kode_kriteria' => 'C1',
                'keterangan' => 'Pengalaman Survei',
                'bobot' => '15',
                'jenis' => 'Benefit'
            ]
        );

        DataKriteria::create(
            [
                'kode_kriteria' => 'C2',
                'keterangan' => 'Pendidikan',
                'bobot' => '30',
                'jenis' => 'Benefit'
            ]
        );

        DataKriteria::create(
            [
                'kode_kriteria' => 'C3',
                'keterangan' => 'Status',
                'bobot' => '20',
                'jenis' => 'Benefit'
            ]
        );

        DataKriteria::create(
            [
                'kode_kriteria' => 'C4',
                'keterangan' => 'Kemampuan Komunikasi',
                'bobot' => '10',
                'jenis' => 'Benefit'
            ]
        );

        DataKriteria::create(
            [
                'kode_kriteria' => 'C5',
                'keterangan' => 'Pengoperasian Gadget/Laptop',
                'bobot' => '25',
                'jenis' => 'Benefit'
            ]
        );
    }
}
