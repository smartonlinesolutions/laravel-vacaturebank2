<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namen = ['remote', 'junior', 'medior', 'senior', 'fulltime', 'parttime'];

        foreach ($namen as $naam) {
            Tag::create(['naam' => $naam]);
        }
    }
}
