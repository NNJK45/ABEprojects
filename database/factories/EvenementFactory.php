<?php

namespace Database\Factories;

use App\Models\Evenement;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'programme_id' => Programme::factory(),
            'titre' => $this->faker->sentence,
            'description' => $this->faker->text(200),
            'lieu' => $this->faker->city,
            'date' => $this->faker->date,
            'annee_event' => (int) $this->faker->year,
            'image' => $this->faker->imageUrl,
        ];
    }
}
