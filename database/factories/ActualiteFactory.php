<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actualite>
 */
class ActualiteFactory extends Factory
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

            'titre' => $this->faker->sentence,
            'contenu' => $this->faker->paragraph,
            'date_publication' => $this->faker->date,
            'image' => $this->faker->imageUrl,
        ];
    }
}
