<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        $kategories = [
            [
                'nama' => 'Pemerintahan Desa',
                'deskripsi' => 'Berita tentang kegiatan pemerintahan desa'
            ],
            [
                'nama' => 'Pembangunan Desa',
                'deskripsi' => 'Berita tentang pembangunan infrastruktur desa'
            ],
            [
                'nama' => 'Kesehatan Masyarakat',
                'deskripsi' => 'Berita tentang kesehatan dan posyandu'
            ],
            [
                'nama' => 'Pendidikan',
                'deskripsi' => 'Berita tentang pendidikan dan kegiatan belajar'
            ],
            [
                'nama' => 'Kegiatan Sosial',
                'deskripsi' => 'Berita tentang kegiatan sosial dan kemasyarakatan'
            ],
            [
                'nama' => 'Umum',
                'deskripsi' => 'Berita umum seputar desa'
            ]
        ];

        foreach ($kategories as $kategori) {
            KategoriBerita::create([
                'nama' => $kategori['nama'],
                'slug' => Str::slug($kategori['nama']),
                'deskripsi' => $kategori['deskripsi']
            ]);
        }
    }
}
