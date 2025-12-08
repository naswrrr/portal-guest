<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $kategoriIds = DB::table('kategori_berita')->pluck('kategori_id')->toArray();

        $judulSample = [
            'Pemerintah Resmikan Program Bantuan Baru',
            'Harga Sembako Mengalami Kenaikan',
            'Jalan Utama Ditutup Karena Perbaikan',
            'Kegiatan Posyandu Berjalan Dengan Lancar',
            'Warga Antusias Mengikuti Vaksinasi Gratis',
            'Bupati Resmi Membuka Festival Budaya 2024',
        ];

        $isiSample = [
            'Kegiatan ini dilakukan untuk meningkatkan pelayanan kepada masyarakat dan memastikan program berjalan efektif.',
            'Menurut warga, kenaikan harga ini sudah terjadi dalam satu minggu terakhir dan cukup memberatkan.',
            'Pihak berwenang mengimbau masyarakat untuk tetap berhati-hati dan mematuhi arahan petugas di lapangan.',
            'Acara berlangsung meriah dan dihadiri oleh berbagai tokoh masyarakat serta pejabat daerah.',
        ];

        foreach (range(1, 100) as $index) {
            DB::table('berita')->insert([
                'kategori_id' => $faker->randomElement($kategoriIds),
                'judul'       => $faker->randomElement($judulSample),
                'slug'        => $faker->unique()->slug,
                'isi_html'    => $faker->randomElement($isiSample),
                'penulis'     => $faker->name,
                'status'      => $faker->randomElement(['draft', 'terbit']),
                'terbit_at'   => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
