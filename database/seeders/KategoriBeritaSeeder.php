<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID'); // ✔ benar

        // Tambahkan provider agar words() & sentence() menjadi Indonesia
        $faker->addProvider(new class($faker) extends \Faker\Provider\Base
        {
            protected static $wordList = [
                'pemerintah', 'teknologi', 'pendidikan', 'kesehatan', 'ekonomi',
                'pariwisata', 'budaya', 'sosial', 'keamanan', 'transportasi',
                'pertanian', 'lingkungan', 'politik', 'digital', 'komunitas',
                'wisata', 'informasi', 'komunikasi', 'pelayanan', 'kampanye',
                'infrastruktur',
            ];
        });

        foreach (range(1, 100) as $index) {
            $nama = $faker->words(2, true);

            DB::table('kategori_berita')->insert([
                'nama'       => $nama,
                'slug'       => Str::slug($nama) . '-' . $faker->unique()->numberBetween(1, 9999),
                'deskripsi'  => $faker->sentence(6),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
