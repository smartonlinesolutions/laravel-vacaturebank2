<?php

namespace Database\Factories;

use App\Models\Bedrijf;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bedrijf>
 */
class BedrijfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naam'    => fake('nl_NL')->company(),
            'plaats'  => fake('nl_NL')->city(),
            'website' => fake('nl_NL')->optional()->url(),
        ];
    }
}
