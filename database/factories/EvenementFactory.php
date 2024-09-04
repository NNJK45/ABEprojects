<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
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

            'programme_id' => \App\Models\Programme::factory(),
            'titre' => $this->faker->sentence,
            'description' => $this->faker->text(200),
            'lieu' => $this->faker->city,
            'date' => $this->faker->date,
            'année-event' => $this->faker->year,
            'image' => $this->faker->imageUrl,
        ];
    }
}
