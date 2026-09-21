<?php

namespace Database\Seeders;

use App\Models\Bedrijf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedrijfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bedrijf::factory()->count(5)->create();
    }
}
