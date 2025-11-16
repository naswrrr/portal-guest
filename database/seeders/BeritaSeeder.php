<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua kategori
        $kategoriPemerintahan = KategoriBerita::where('nama', 'Pemerintahan Desa')->first();
        $kategoriPembangunan = KategoriBerita::where('nama', 'Pembangunan Desa')->first();
        $kategoriKesehatan = KategoriBerita::where('nama', 'Kesehatan Masyarakat')->first();
        $kategoriPendidikan = KategoriBerita::where('nama', 'Pendidikan')->first();
        $kategoriSosial = KategoriBerita::where('nama', 'Kegiatan Sosial')->first();

        $berita = [
            [
                'judul' => 'Rapat Koordinasi Bulanan Desa',
                'kategori_id' => $kategoriPemerintahan->kategori_id,
                'isi_html' => '<p>Pada hari Senin, 15 Januari 2024, dilaksanakan rapat koordinasi bulanan di balai desa. Rapat dihadiri oleh perangkat desa, ketua RT/RW, dan perwakilan masyarakat.</p><p>Agenda rapat membahas perkembangan pembangunan desa, laporan keuangan, dan rencana kegiatan bulan depan.</p>',
                'penulis' => 'Sekretaris Desa',
                'status' => 'terbit',
                'terbit_at' => now()->subDays(5)
            ],
            [
                'judul' => 'Pembangunan Jalan Desa Selesai',
                'kategori_id' => $kategoriPembangunan->kategori_id,
                'isi_html' => '<p>Pembangunan jalan desa sepanjang 2 km telah selesai dikerjakan. Jalan ini menghubungkan dusun Krajan dengan dusun Sumberrejo.</p><p>Dengan selesainya pembangunan ini, akses transportasi warga menjadi lebih lancar dan mudah.</p>',
                'penulis' => 'Kepala Desa',
                'status' => 'terbit',
                'terbit_at' => now()->subDays(3)
            ],
            [
                'judul' => 'Posyandu Balita Bulan Ini',
                'kategori_id' => $kategoriKesehatan->kategori_id,
                'isi_html' => '<p>Posyandu balita akan dilaksanakan pada:</p><p>📅 Tanggal: 20 Januari 2024</p><p>⏰ Waktu: 08.00 - 12.00 WIB</p><p>📍 Tempat: Balai Desa</p><p>Kegiatan meliputi penimbangan, pengukuran tinggi badan, dan pemberian vitamin A.</p>',
                'penulis' => 'Bidan Desa',
                'status' => 'terbit',
                'terbit_at' => now()->subDays(1)
            ],
            [
                'judul' => 'Program Bantuan Pendidikan Anak',
                'kategori_id' => $kategoriPendidikan->kategori_id,
                'isi_html' => '<p>Pemerintah desa meluncurkan program bantuan pendidikan untuk anak-anak kurang mampu. Program ini berupa bantuan biaya sekolah dan perlengkapan belajar.</p><p>Pendaftaran dibuka sampai tanggal 25 Januari 2024.</p>',
                'penulis' => 'Badan Permusyawaratan Desa',
                'status' => 'terbit',
                'terbit_at' => now()
            ],
            [
                'judul' => 'Kerja Bakti Bersih-bersih Desa',
                'kategori_id' => $kategoriSosial->kategori_id,
                'isi_html' => '<p>Ayo ramai-ramai kerja bakti!</p><p>🗓️ Hari: Minggu, 28 Januari 2024</p><p>🕗 Waktu: 07.00 WIB</p><p>📍 Titik Kumpul: Lapangan Desa</p><p>Kegiatan: membersihkan selokan, taman, dan fasilitas umum.</p>',
                'penulis' => 'Ketua Karang Taruna',
                'status' => 'draft',
                'terbit_at' => null
            ]
        ];

        foreach ($berita as $item) {
            Berita::create([
                'kategori_id' => $item['kategori_id'],
                'judul' => $item['judul'],
                'slug' => Str::slug($item['judul']),
                'isi_html' => $item['isi_html'],
                'penulis' => $item['penulis'],
                'status' => $item['status'],
                'terbit_at' => $item['terbit_at']
            ]);
        }
    }
}
