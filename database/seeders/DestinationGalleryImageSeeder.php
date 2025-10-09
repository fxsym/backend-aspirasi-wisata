<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationGalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('destination_gallery_images')->insert([
                'destination_id' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759996517/view_ov9bdt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
