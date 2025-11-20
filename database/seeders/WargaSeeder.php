<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // pakai lokal Indonesia biar lebih real

        foreach (range(1, 100) as $index) {
            DB::table('warga')->insert([
                'nama'          => $faker->name,
                'nik'           => $faker->unique()->numerify('################'), // 16 digit
                'no_kk'         => $faker->numerify('################'), // 16 digit random
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat'        => $faker->address,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}

