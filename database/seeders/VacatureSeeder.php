<?php

namespace Database\Seeders;

use App\Models\Bedrijf;
use App\Models\Tag;
use App\Models\Vacature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();

        Vacature::factory()->count(25)->create([
            'bedrijf_id' => fn () => Bedrijf::inRandomOrder()->value('id'),
        ])->each(function (Vacature $vacature) use ($tags) {
            $vacature->tags()->sync(
                $tags->random(rand(1, 3))->pluck('id')
            );
        });
    }
}
