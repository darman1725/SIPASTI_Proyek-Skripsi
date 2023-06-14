<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BeritaSeeder;
use Database\Seeders\KegiatanSeeder;
use Database\Seeders\DataKriteriaSeeder;
use Database\Seeders\DataSubKriteriaSeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            // DataKriteriaSeeder::class,
            UserSeeder::class,
            BeritaSeeder::class,
            KegiatanSeeder::class,
            DataKriteriaSeeder::class,
            DataSubKriteriaSeeder::class,
        ]);
    }
}
