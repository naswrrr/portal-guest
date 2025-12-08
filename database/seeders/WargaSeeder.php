<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // ✔ Data Indonesia

        // Daftar pekerjaan real Indonesia
        $pekerjaanList = [
            'Petani', 'Buruh', 'Guru', 'Pedagang', 'PNS', 'Nelayan',
            'Karyawan Swasta', 'Ibu Rumah Tangga', 'Mahasiswa', 'Sopir',
            'Perawat', 'Satpam', 'Dokter', 'Montir', 'Penjahit', 'Pengrajin',
            'Wirausaha', 'Pengacara', 'Arsitek', 'Teknisi', 'Security', 'Kasir'
        ];

        foreach (range(1, 100) as $index) {
            DB::table('warga')->insert([
                'no_ktp'        => $faker->unique()->numerify('################'), // ✔ 16 digit
                'nama'          => $faker->name,                                  // ✔ Nama Indonesia
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement([
                    'Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'
                ]),
                'pekerjaan'     => $faker->randomElement($pekerjaanList),         // ✔ Pekerjaan Indonesia
                'telp'          => '+62' . $faker->numberBetween(811, 899) .
                                   $faker->numberBetween(1000000, 9999999),      // ✔ Format Indonesia
                'email'         => strtolower(str_replace(' ', '', $faker->name)) .
                                   $faker->numberBetween(10,99) . '@gmail.com',   // ✔ Email realistis
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
