<?php

namespace Tests\Feature;

use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Message;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminContentManagementTest extends TestCase
{
    use RefreshDatabase;

    private User $editor;

    protected function setUp(): void
    {
        parent::setUp();
        $this->editor = User::factory()->create();
    }

    public function test_editor_can_manage_programmes(): void
    {
        $this->actingAs($this->editor)
            ->get(route('admin.programmes.index'))
            ->assertOk();

        $this->post(route('admin.programmes.store'), [
            'nom' => 'Santé communautaire',
            'description' => 'Programme de santé communautaire.',
        ])->assertRedirect(route('admin.programmes.index'));

        $programme = Programme::query()->firstOrFail();
        $this->assertSame('Santé communautaire', $programme->nom);

        $this->put(route('admin.programmes.update', $programme), [
            'nom' => 'Santé et bien-être',
            'description' => 'Programme actualisé.',
        ])->assertRedirect(route('admin.programmes.index'));

        $this->assertDatabaseHas('programmes', ['nom' => 'Santé et bien-être']);

        $this->delete(route('admin.programmes.destroy', $programme))
            ->assertRedirect(route('admin.programmes.index'));
        $this->assertDatabaseMissing('programmes', ['id' => $programme->id]);
    }

    public function test_editor_can_manage_events_and_search_them(): void
    {
        $programme = Programme::factory()->create();
        $payload = [
            'programme_id' => $programme->id,
            'titre' => 'Journée du bien-être',
            'description' => 'Une journée communautaire.',
            'lieu' => 'Douala',
            'date' => '2026-10-10',
            'annee_event' => 2026,
            'image' => 'https://example.test/event.jpg',
        ];

        $this->actingAs($this->editor)
            ->post(route('admin.evenements.store'), $payload)
            ->assertRedirect(route('admin.evenements.index'));

        $evenement = Evenement::query()->firstOrFail();
        $this->get(route('admin.evenements.index', ['q' => 'Douala']))
            ->assertOk()
            ->assertSee('Journée du bien-être');

        $payload['titre'] = 'Journée ABE';
        $this->put(route('admin.evenements.update', $evenement), $payload)
            ->assertRedirect(route('admin.evenements.index'));
        $this->assertDatabaseHas('evenements', ['titre' => 'Journée ABE']);

        $this->delete(route('admin.evenements.destroy', $evenement));
        $this->assertDatabaseMissing('evenements', ['id' => $evenement->id]);
    }

    public function test_editor_can_manage_news_and_validation_rejects_invalid_data(): void
    {
        $this->actingAs($this->editor)
            ->post(route('admin.actualites.store'), [])
            ->assertSessionHasErrors(['titre', 'contenu', 'date_publication', 'image']);

        $payload = [
            'titre' => 'Nouvelle activité ABE',
            'contenu' => 'Présentation de la nouvelle activité.',
            'date_publication' => '2026-09-02',
            'image' => 'https://example.test/news.jpg',
        ];

        $this->post(route('admin.actualites.store'), $payload)
            ->assertRedirect(route('admin.actualites.index'));

        $actualite = Actualite::query()->firstOrFail();
        $this->get(route('admin.actualites.index', ['q' => 'Nouvelle']))
            ->assertOk()
            ->assertSee('Nouvelle activité ABE');

        $payload['titre'] = 'Activité ABE actualisée';
        $this->put(route('admin.actualites.update', $actualite), $payload);
        $this->assertDatabaseHas('actualites', ['titre' => 'Activité ABE actualisée']);

        $this->delete(route('admin.actualites.destroy', $actualite));
        $this->assertDatabaseMissing('actualites', ['id' => $actualite->id]);
    }

    public function test_editor_can_manage_images_with_exactly_one_owner(): void
    {
        $evenement = Evenement::factory()->create();
        $actualite = Actualite::factory()->create();

        $this->actingAs($this->editor)
            ->post(route('admin.images.store'), [
                'url' => 'https://example.test/gallery.jpg',
                'evenement_id' => $evenement->id,
                'actualite_id' => $actualite->id,
            ])
            ->assertSessionHasErrors(['evenement_id', 'actualite_id']);

        $this->post(route('admin.images.store'), [
            'url' => 'https://example.test/gallery.jpg',
            'evenement_id' => $evenement->id,
        ])->assertRedirect(route('admin.images.index'));

        $image = Image::query()->firstOrFail();
        $this->get(route('admin.images.index', ['q' => 'gallery']))
            ->assertOk()
            ->assertSee($evenement->nom);

        $this->put(route('admin.images.update', $image), [
            'url' => 'https://example.test/news-gallery.jpg',
            'actualite_id' => $actualite->id,
        ])->assertRedirect(route('admin.images.index'));
        $this->assertDatabaseHas('images', [
            'id' => $image->id,
            'evenement_id' => null,
            'actualite_id' => $actualite->id,
        ]);

        $this->delete(route('admin.images.destroy', $image));
        $this->assertDatabaseMissing('images', ['id' => $image->id]);
    }

    public function test_editor_can_read_search_and_delete_messages(): void
    {
        $sender = User::factory()->create(['name' => 'Client ABE']);
        $message = Message::factory()->for($sender)->create([
            'contenu' => 'Demande de partenariat institutionnel.',
        ]);

        $this->actingAs($this->editor)
            ->get(route('admin.messages.index', ['q' => 'partenariat']))
            ->assertOk()
            ->assertSee('Client ABE');

        $this->get(route('admin.messages.show', $message))
            ->assertOk()
            ->assertSee('Demande de partenariat institutionnel.');

        $this->delete(route('admin.messages.destroy', $message))
            ->assertRedirect(route('admin.messages.index'));
        $this->assertDatabaseMissing('messages', ['id' => $message->id]);
    }
}
