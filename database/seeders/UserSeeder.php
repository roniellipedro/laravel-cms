<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'admin' => true
        ]);

        User::create([
            'name' => 'usuario 1',
            'email' => 'usuario1@teste.com',
            'password' => '1234',
            'admin' => false
        ]);

        User::create([
            'name' => 'usuario 2',
            'email' => 'usuario2@teste.com',
            'password' => '1234',
            'admin' => false
        ]);

        User::create([
            'name' => 'usuario 3',
            'email' => 'usuario3@teste.com',
            'password' => '1234',
            'admin' => false
        ]);
    }
}
