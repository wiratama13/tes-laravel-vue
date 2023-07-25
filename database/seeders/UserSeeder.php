<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'wira',
            'username' => 'wiratama',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}
