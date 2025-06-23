<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'title',
            'content' => 'Exemplo de Site'
        ]);

        Setting::create([
            'name' => 'subtitle',
            'content' => 'Criado pelo aluno'
        ]);

        Setting::create([
            'name' => 'email',
            'content' => 'contato@site.com'
        ]);

        Setting::create([
            'name' => 'bgcolor',
            'content' => '#000000'
        ]);

        Setting::create([
            'name' => 'textcolor',
            'content' => '#FFFFFF'
        ]);
    }
}
