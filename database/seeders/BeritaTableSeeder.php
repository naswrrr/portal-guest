<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID'); // 🇮🇩 Locale Indonesia

        // Ambil semua kategori_id yang sudah dibuat di seeder kategori
        $kategoriIds = DB::table('kategori_berita')->pluck('kategori_id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('berita')->insert([
                'kategori_id' => $faker->randomElement($kategoriIds), // Relasi ke kategori
                'judul' => $faker->sentence(6),
                'slug' => $faker->unique()->slug,
                'isi_html' => $faker->paragraphs(3, true),
                'penulis' => $faker->name,
                'status' => $faker->randomElement(['draft', 'terbit']),
                'terbit_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
