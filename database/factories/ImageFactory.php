<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
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
            'url' => $this->faker->imageUrl,
            'evenement_id' => \App\Models\Evenement::factory(),
            'actualite_id' => \App\Models\Actualite::factory(),

        ];
    }
}
