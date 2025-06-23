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
            'name' => 'teste1',
            'email' => 'teste1@teste.com',
            'password' => '1234',
            'admin' => false
        ]);

        User::create([
            'name' => 'teste2',
            'email' => 'teste2@teste.com',
            'password' => '1234',
            'admin' => false
        ]);

        User::create([
            'name' => 'teste3',
            'email' => 'teste3@teste.com',
            'password' => '1234',
            'admin' => false
        ]);
    }
}
