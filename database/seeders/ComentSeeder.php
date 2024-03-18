<?php

namespace Database\Seeders;

use App\Models\Coment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coment::query()->delete();

        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $index) {
            $postId = rand(1, 10);
            $userId = rand(1, 10);

            Coment::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'coments_content' => $faker->paragraph(1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
