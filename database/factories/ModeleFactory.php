<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modele>
 */
class ModeleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->numberBetween(),
            'modele' => fake()->text(),
            'marque' => fake()->text(),
            'couleur' => fake()->text(),
            'nombres_places' => fake()->numberBetween(1,5),
            'energie' => fake()->text(),
        ];
    }
}
