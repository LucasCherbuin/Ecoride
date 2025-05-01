<?php

namespace Database\Factories;

use App\Models\Modele;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\conducteur>
 */
class ConducteurFactory extends Factory
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
            'immatriculation' => strtoupper(fake()->bothify('??-###-??')),
            'date_immatriculation' => fake()->date(),
            'modele_id' => function () {
                return Modele::inRandomOrder()->first()?->id ?? Modele::factory()->create()->id;
                },
            'user_id' => function () {
                return User::inRandomOrder()->first()?->id ?? User::factory()->create()->id;
                },
        ];
    }
}
