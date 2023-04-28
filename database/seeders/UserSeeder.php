<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Information\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nik = '1208231701010001';
        $user->email = 'admin@example.com';
        $user->nama_lengkap = 'Darman Saragih';
        $user->username = 'Admin Web';
        $user->password = Hash::make('password');
        $user->level = 'admin'; // Set level to 'admin'
        $user->save();
    }
}
