<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visitor::create([
            'ip' => 1,
            'date_access' => date('Y-m-d'),
            'page' => '/'
        ]);

        Visitor::create([
            'ip' => 1,
            'date_access' => date('Y-m-d'),
            'page' => '/'
        ]);

        Visitor::create([
            'ip' => 2,
            'date_access' => date('Y-m-d'),
            'page' => '/index'
        ]);
    }
}
