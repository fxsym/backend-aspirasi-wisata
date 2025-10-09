<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destination_categories')->insert([
            ['name' => 'Site 1', 'description' => 'Wisata pada site 1'],
            ['name' => 'Site 2', 'description' => 'Wisata pada site 2'],
            ['name' => 'Site 3', 'description' => 'Wisata pada site 3'],
            ['name' => 'Site 4', 'description' => 'Wisata pada site 4'],
            ['name' => 'Site 5', 'description' => 'Wisata pada site 5'],
        ]);
    }
}
