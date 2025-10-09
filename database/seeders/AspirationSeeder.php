<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('aspirations')->insert([
                'destination_id' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'name' => fake()->name(),
                'phone' => fake()->numerify('08##########'),
                'content' => fake()->paragraphs(fake()->numberBetween(1, 3), true),
                'aspiration_category_id' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7]),
                'image' => fake()->optional($weight = 0.6)->randomElement([
                    'https://res.cloudinary.com/djfxfwzin/image/upload/v1759995609/aspirations_rst4se.jpg',
                    null,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
