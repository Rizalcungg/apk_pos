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
        // Buat akun utama admin
        User::create([
            'name' => 'RIZAL', // <-- Nama yang akan tampil di navbar/sidebar
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 1,
        ]);

        // Jika ingin membuat user dummy tambahan
        User::factory()->count(5)->create([
            'role_id' => 1,
        ]);
    }
}