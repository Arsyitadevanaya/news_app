<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posts::query()->delete();

        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $index) {
            $userId = rand(1, 10);

            Posts::create([
                'author' => $userId,
                'title' => $faker->sentence(2),
                'news_content' => $faker->paragraph(1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
