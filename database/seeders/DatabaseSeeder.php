<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KategoriBeritaSeeder::class,
            BeritaTableSeeder::class,  // Update nama class di sini
            WargaSeeder::class,
            UsersSeeder::class,

        ]);
    }
}

