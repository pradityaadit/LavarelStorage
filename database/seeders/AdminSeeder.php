<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Mahasiswa::create([
            'nim' => 'admin',
            'nama' => 'Admin',
            'jurusan' => 'Admin Department',
            'no_hp' => '123456789',
            'password' => bcrypt('admin1234567'),
            'is_admin' => true,
        ]);
    }
}
