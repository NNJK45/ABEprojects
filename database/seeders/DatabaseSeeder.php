<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Programme;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $programmes = Programme::factory(3)->create();
        $evenements = Evenement::factory(10)->recycle($programmes)->create();
        $actualites = Actualite::factory(10)->create();

        Commentaire::factory(10)->recycle($evenements)->create();

        Image::factory(5)
            ->sequence(fn () => [
                'evenement_id' => $evenements->random()->id,
                'actualite_id' => null,
            ])
            ->create();

        Image::factory(5)
            ->sequence(fn () => [
                'evenement_id' => null,
                'actualite_id' => $actualites->random()->id,
            ])
            ->create();
    }
}
