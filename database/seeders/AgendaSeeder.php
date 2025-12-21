<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Faker\Factory as Faker;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {

            // tanggal mulai: 1 bulan lalu s.d. 3 bulan ke depan
            $startDate = $faker->dateTimeBetween('-1 month', '+3 months');

            // tanggal selesai: 1–5 hari setelah tanggal mulai
            $endDate = (clone $startDate)->modify('+' . rand(1, 5) . ' days');

            Agenda::create([
                'judul'           => 'Agenda: ' . $faker->sentence(4),
                'lokasi'          => $faker->address(),
                'tanggal_mulai'   => $startDate->format('Y-m-d'),
                'tanggal_selesai' => $endDate->format('Y-m-d'),
                'penyelenggara'   => $faker->company(),
                'deskripsi'       => $faker->paragraph(3),
            ]);
        }
    }
}
