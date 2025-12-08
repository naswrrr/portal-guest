<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        // Daftar kata berbahasa Indonesia untuk membuat nama kategori
        $wordList = [
            'pemerintah', 'teknologi', 'pendidikan', 'kesehatan', 'ekonomi',
            'pariwisata', 'budaya', 'sosial', 'keamanan', 'transportasi',
            'pertanian', 'lingkungan', 'politik', 'digital', 'komunitas',
            'wisata', 'informasi', 'komunikasi', 'pelayanan', 'kampanye',
            'infrastruktur', 'pengembangan', 'masyarakat', 'publik', 'desa',
            'kota', 'pertumbuhan', 'umum', 'media', 'konservasi'
        ];

        // Kalimat contoh untuk deskripsi kategori (bahasa Indonesia)
        $kalimatDeskripsi = [
            "Kategori ini berisi informasi terbaru terkait perkembangan di bidang tersebut.",
            "Berita yang dimuat mencakup berbagai peristiwa penting yang terjadi.",
            "Menyajikan informasi akurat dan terpercaya untuk pembaca.",
            "Berisi rangkuman kegiatan dan program terbaru yang dilaksanakan.",
            "Membahas isu-isu aktual yang relevan bagi masyarakat."
        ];

        foreach (range(1, 100) as $index) {

            // Nama kategori acak (2 kata Indonesia)
            $nama = $wordList[array_rand($wordList)] . ' ' . $wordList[array_rand($wordList)];

            DB::table('kategori_berita')->insert([
                'nama'       => ucfirst($nama),
                'slug'       => Str::slug($nama) . '-' . rand(100, 9999),
                'deskripsi'  => $kalimatDeskripsi[array_rand($kalimatDeskripsi)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
