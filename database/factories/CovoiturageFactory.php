<?php

namespace Database\Factories;

use App\Models\Conducteur;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Covoiturage>
 */
class CovoiturageFactory extends Factory
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
            'depart' => fake()->text(),
            'arrivee' => fake()->text(),
            'date' => fake()->date(),
            'heure_depart' => fake()->time(),
            'heure_arrive' => fake()->time(),
            'prix' => fake()->numberBetween(5,50),
            'ecologique' => fake()->boolean(),
            'user_id' => function () {
                return User::inRandomOrder()->first()?->id ?? User::factory()->create()->id;
                },
            'conducteur_id' => function () {
                return Conducteur::inRandomOrder()->first()?->id ?? Conducteur::factory()->create()->id;
                },
            'status_id' => function () {
                return Status::inRandomOrder()->first()?->id ?? Status::factory()->create()->id;
                },
        ];
    }
}
