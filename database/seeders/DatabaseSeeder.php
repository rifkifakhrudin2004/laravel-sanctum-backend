<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '081234567890',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nip' => 'ADM001'
        ]);

        // Create Dosen
        User::create([
            'name' => 'Dosen User',
            'email' => 'dosen@example.com',
            'phone' => '081234567891',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
            'nip' => 'DOS001'
        ]);

        // Create Mahasiswa
        User::create([
            'name' => 'Mahasiswa User',
            'email' => 'mahasiswa@example.com',
            'phone' => '081234567892',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'nim' => 'MHS001'
        ]);
    }
}