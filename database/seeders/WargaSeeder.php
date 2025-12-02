<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // data lebih real Indonesia

        foreach (range(1, 100) as $index) {
            DB::table('warga')->insert([
                'no_ktp'        => $faker->unique()->numerify('################'), // 16 digit
                'nama'          => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement(['Islam','Kristen','Katholik','Hindu','Buddha','Konghucu']),
                'pekerjaan'     => $faker->jobTitle,
                'telp'          => $faker->phoneNumber,
                'email'         => $faker->safeEmail,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
