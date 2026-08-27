<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun utama kamu
        User::create([
            'name' => 'Fairus',
            'email' => 'fairusisminuraziz@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 1, // <-- Tambahkan role_id di sini
        ]);

        // Jika menggunakan factory, pastikan role_id juga diisi
        User::factory()->count(5)->create([
            'role_id' => 1,
        ]);
    }
}