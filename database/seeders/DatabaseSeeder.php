<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        DB::table('tbl_mahasiswa')->insert([
            'nim' => '00000000',
            'nama_depan' => 'admin',
            'nama_belakang' => 'admin',
            'tgl_lahir' => '2023-12-05',
            'email' => 'admin12@gmail.com',
            'universitas' => 'UNIVADMIN',
            'nohp' => '081234567890',
        ]);
    }
}
