<?php

namespace Database\Factories;

use App\Models\Covoiturage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avis>
 */
class AvisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->numberBetween(1,20),
            'note' => fake()->randomNumber(1,5),
            'commentaire' => fake()->text(),
            'valid' => fake()->boolean(),
            'user_id' => function () {
                return User::inRandomOrder()->first()?->id ?? User::factory()->create()->id;
                },
            'covoiturage_id' => function () {
                return Covoiturage::inRandomOrder()->first()?->id ?? Covoiturage::factory()->create()->id;
            },
        ];
    }
}
