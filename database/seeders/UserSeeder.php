<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        $user->username = 'Admin Web';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('password');
        $user->level = 'admin'; // Set level to 'admin'
        $user->save();
    }
}
