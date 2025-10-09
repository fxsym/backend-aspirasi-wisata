<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspirationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aspiration_categories')->insert([
            ['name' => 'Fasilitas'],
            ['name' => 'Pelayanan Petugas'],
            ['name' => 'Kebersihan & Lingkungan'],
            ['name' => 'Harga & Tiket'],
            ['name' => 'Akses & Transportasi'],
            ['name' => 'Keamanan & Keselamatan'],
            ['name' => 'Lainnya'],
        ]);
    }
}
