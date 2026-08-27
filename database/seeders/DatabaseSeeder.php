<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vacature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Vacature::factory()
            ->count(25)
            ->create();
    }
}
