<?php

namespace Database\Factories;

use App\Models\Vacature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vacature>
 */
class VacatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titel' => fake('nl_NL')->jobTitle(),
            'bedrijf' => fake('nl_NL')->company(),
            'plaats' => fake('nl_NL')->city(),
            'omschrijving' => fake('nl_NL')->paragraph(),
            'salaris' => fake('nl_NL')->numberBetween(4000,8000),
            'fulltime' => fake()->boolean()
        ];
    }
}
