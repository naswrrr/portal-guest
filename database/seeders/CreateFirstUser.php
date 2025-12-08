<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nasiwwaa',
            'email' => 'nasiwa@pcr.ac.id',
            'password' => Hash::make('nasiwa123'),
            'role' => 'Admin',
        ]);
    }
}
