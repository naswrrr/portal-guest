<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use Faker\Factory as Faker;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            Galeri::create([
                'judul'     => $faker->words(3, true) . ' Activity',
                'deskripsi' => $faker->paragraph(2),
            ]);
        }
    }
}
