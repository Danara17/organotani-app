<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat admin baru dan simpan ke database
        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@admin',
            'phone' => '081234463364',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'email_verification_token' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            // Gantilah 'password' dengan kata sandi yang aman
            'role' => 'admin',
            // Atur peran admin sesuai kebutuhan
        ]);
    }
}