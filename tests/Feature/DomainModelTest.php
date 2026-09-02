<?php

namespace Tests\Feature;

use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Message;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DomainModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_domain_schema_is_normalized_without_discarding_the_legacy_table(): void
    {
        $this->assertTrue(Schema::hasColumn('evenements', 'annee_event'));
        $this->assertFalse(Schema::hasColumn('evenements', 'année-event'));
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasTable('legacy_users'));
    }

    public function test_event_relations_and_casts_are_consistent(): void
    {
        $programme = Programme::factory()->create();
        $evenement = Evenement::factory()->for($programme)->create([
            'date' => '2026-09-02',
            'annee_event' => 2026,
        ]);
        $commentaire = Commentaire::factory()->for($evenement)->create();
        $image = Image::factory()->for($evenement)->create();

        $this->assertTrue($evenement->programme->is($programme));
        $this->assertTrue($evenement->commentaires->contains($commentaire));
        $this->assertTrue($evenement->images->contains($image));
        $this->assertSame('2026-09-02', $evenement->date->toDateString());
        $this->assertSame(2026, $evenement->annee_event);
    }

    public function test_news_and_user_relations_are_consistent(): void
    {
        $actualite = Actualite::factory()->create();
        $image = Image::factory()->for($actualite)->create();
        $user = User::factory()->create();
        $message = Message::factory()->for($user)->create();

        $this->assertTrue($actualite->images->contains($image));
        $this->assertTrue($image->actualite->is($actualite));
        $this->assertTrue($message->user->is($user));
        $this->assertTrue($user->messages->contains($message));
    }

    public function test_event_detail_displays_the_requested_event(): void
    {
        $evenement = Evenement::factory()->create([
            'titre' => 'Événement ABE vérifié',
        ]);

        $this->get(route('event.details', $evenement))
            ->assertOk()
            ->assertSee('Événement ABE vérifié');
    }

    public function test_seed_data_has_controlled_volumes_and_valid_image_owners(): void
    {
        $this->seed();

        $this->assertDatabaseCount('programmes', 3);
        $this->assertDatabaseCount('evenements', 10);
        $this->assertDatabaseCount('actualites', 10);
        $this->assertDatabaseCount('commentaires', 10);
        $this->assertDatabaseCount('images', 10);
        $this->assertSame(0, Image::query()
            ->whereNull('evenement_id')
            ->whereNull('actualite_id')
            ->count());
        $this->assertSame(0, Image::query()
            ->whereNotNull('evenement_id')
            ->whereNotNull('actualite_id')
            ->count());
    }
}
