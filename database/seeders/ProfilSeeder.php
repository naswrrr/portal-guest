<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Media;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // Daftar provinsi di Indonesia
        $provinsiList = [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau',
            'Jambi', 'Bengkulu', 'Sumatera Selatan', 'Kepulauan Bangka Belitung', 'Lampung',
            'Banten', 'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta',
            'Jawa Timur', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Kalimantan Barat',
            'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
            'Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara',
            'Sulawesi Barat', 'Maluku', 'Maluku Utara', 'Papua Barat', 'Papua'
        ];

        // Mapping kabupaten per provinsi
        $kabupatenByProvinsi = [
            'Jawa Barat' => ['Bandung', 'Bogor', 'Bekasi', 'Depok', 'Cirebon', 'Tasikmalaya', 'Garut', 'Subang', 'Purwakarta'],
            'Jawa Tengah' => ['Semarang', 'Surakarta', 'Magelang', 'Pekalongan', 'Tegal', 'Cilacap', 'Banyumas', 'Kebumen', 'Wonosobo'],
            'Jawa Timur' => ['Surabaya', 'Malang', 'Sidoarjo', 'Madiun', 'Kediri', 'Blitar', 'Jember', 'Banyuwangi', 'Pasuruan'],
            'DKI Jakarta' => ['Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Barat', 'Jakarta Utara'],
            'Bali' => ['Badung', 'Denpasar', 'Gianyar', 'Tabanan', 'Bangli', 'Klungkung'],
            'Sumatera Utara' => ['Medan', 'Binjai', 'Pematang Siantar', 'Tebing Tinggi', 'Tanjung Balai'],
            'Banten' => ['Serang', 'Tangerang', 'Cilegon', 'Lebak', 'Pandeglang'],
            'DI Yogyakarta' => ['Sleman', 'Bantul', 'Kulon Progo', 'Gunung Kidul'],
        ];

        // Nama-nama desa yang umum di Indonesia
        $namaDesaPrefix = ['Desa', 'Kelurahan', 'Kampung'];
        $namaDesaSuffix = [
            'Mekar', 'Jaya', 'Sejahtera', 'Baru', 'Indah', 'Makmur', 'Sari', 'Mulyo',
            'Raya', 'Abadi', 'Asri', 'Lestari', 'Permai', 'Damai', 'Sentosa'
        ];

        // Daftar nama file logo desa (placeholder)
        $logoFiles = [
            'logo-desa-1.png', 'logo-desa-2.png', 'logo-desa-3.png',
            'logo-desa-4.png', 'logo-desa-5.png', 'logo-desa-6.png',
            'logo-desa-7.png', 'logo-desa-8.png', 'logo-desa-9.png', 'logo-desa-10.png'
        ];

        // Hapus data lama jika ada
        DB::table('profil')->truncate();
        // Hanya hapus media untuk profil, bukan semua media
        DB::table('media')->where('ref_table', 'profil')->delete();

        foreach (range(1, 100) as $index) {
            // Pilih provinsi acak
            $provinsi = $faker->randomElement($provinsiList);

            // Tentukan kabupaten
            $kabupaten = isset($kabupatenByProvinsi[$provinsi])
                ? $faker->randomElement($kabupatenByProvinsi[$provinsi])
                : $faker->city;

            // Buat nama desa
            $namaDesa = $faker->randomElement($namaDesaPrefix) . ' ' .
                       $faker->randomElement($namaDesaSuffix) . ' ' .
                       $faker->randomElement(['I', 'II', 'III', 'IV', 'V']);

            // Buat kecamatan
            $kecamatan = 'Kecamatan ' . $faker->city;

            // Insert profil
            $profilId = DB::table('profil')->insertGetId([
                'nama_desa' => $namaDesa,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'alamat_kantor' => 'Jl. ' . $faker->streetName . ' No. ' . $faker->buildingNumber . ', ' . $kecamatan,
                'email' => strtolower(str_replace(' ', '', $namaDesa)) . '@desa.id',
                'telepon' => '+62' . $faker->numberBetween(811, 899) . $faker->numberBetween(1000000, 9999999),
                'visi' => 'Menjadi ' . $namaDesa . ' yang ' . $faker->randomElement(['maju', 'sejahtera', 'mandiri', 'berbudaya']) . ' dan ' . $faker->randomElement(['berkualitas', 'bermartabat', 'berdaya saing']),
                'misi' => '1. ' . $faker->sentence(6) . "\n2. " . $faker->sentence(6) . "\n3. " . $faker->sentence(6),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Tambahkan media (logo) untuk setiap profil
            $logoFile = $faker->randomElement($logoFiles);

            Media::create([
                'ref_table'  => 'profil',
                'ref_id'     => $profilId,
                'file_name'  => 'media/profil/' . $logoFile, // ✅ FIXED: Sesuai controller
                'caption'    => 'Logo ' . $namaDesa,
                'mime_type'  => 'image/png',
                'sort_order' => 1,
            ]);
        }

        $this->command->info('✅ Seeder ProfilSeeder berhasil: 100 data profil desa telah dibuat!');
        $this->command->info('🖼️  Media logo juga ditambahkan untuk setiap profil');
        $this->command->info('📋 Struktur sesuai ketentuan dosen:');
        $this->command->info('   - profil_id (PK)');
        $this->command->info('   - nama_desa');
        $this->command->info('   - kecamatan');
        $this->command->info('   - kabupaten');
        $this->command->info('   - provinsi');
        $this->command->info('   - alamat_kantor');
        $this->command->info('   - email');
        $this->command->info('   - telepon');
        $this->command->info('   - visi');
        $this->command->info('   - misi');
        $this->command->info('   - Logo → via media (ref_table="profil") ✅');
    }
}
