<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         // Seeder pour la table programmes
         \App\Models\Programme::factory(3)->create();

         // Seeder pour la table evenements
         \App\Models\Evenement::factory(10)->create();
 
         // Seeder pour la table actualites
         \App\Models\Actualite::factory(10)->create();
 
         // Seeder pour la table commentaires
         \App\Models\Commentaire::factory(10)->create();
 
         // Seeder pour la table images
         \App\Models\Image::factory(10)->create();
    }
}
