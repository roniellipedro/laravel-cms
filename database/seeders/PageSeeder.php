<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => 'página 1',
            'slug' => 'pagina-1',
            'body' => 'página 1'
        ]);

        Page::create([
            'title' => 'página 2',
            'slug' => 'pagina-2',
            'body' => 'página 2'
        ]);

        Page::create([
            'title' => 'página 3',
            'slug' => 'pagina-3',
            'body' => 'página 3'
        ]);
    }
}
