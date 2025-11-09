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
            ['name' => 'Site Baturraden', 'description' => 'Wisata pada site 1'],
            ['name' => 'Site Gn. Slamet', 'description' => 'Wisata pada site 2'],
            ['name' => 'Site Cipendok', 'description' => 'Wisata pada site 3'],
            ['name' => 'Site Gombong Selatan', 'description' => 'Wisata pada site 4'],
            ['name' => 'Site Dieng', 'description' => 'Wisata pada site 5'],
        ]);
    }
}
