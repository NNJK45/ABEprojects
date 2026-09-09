<?php

namespace Tests\Feature;

use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Message;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        Storage::fake('public');
        $image = UploadedFile::fake()->image('sante.jpg', 1200, 800);

        $this->actingAs($this->editor)
            ->get(route('admin.programmes.index'))
            ->assertOk();

        $this->post(route('admin.programmes.store'), [
            'nom' => 'Santé communautaire',
            'description' => 'Programme de santé communautaire.',
            'image' => $image,
            'gallery_images' => [
                UploadedFile::fake()->image('atelier.jpg'),
                UploadedFile::fake()->image('participants.jpg'),
            ],
        ])->assertRedirect(route('admin.programmes.index'));

        $programme = Programme::query()->firstOrFail();
        $this->assertSame('Santé communautaire', $programme->nom);
        Storage::disk('public')->assertExists($programme->image);
        $galleryImages = $programme->images()->get();
        $this->assertCount(2, $galleryImages);
        $galleryImages->each(fn (Image $image) => Storage::disk('public')->assertExists($image->url));

        $this->put(route('admin.programmes.update', $programme), [
            'nom' => 'Santé et bien-être',
            'description' => 'Programme actualisé.',
            'remove_gallery_images' => [$galleryImages->first()->id],
        ])->assertRedirect(route('admin.programmes.index'));

        $this->assertDatabaseHas('programmes', ['nom' => 'Santé et bien-être']);
        $this->assertCount(1, $programme->images()->get());
        Storage::disk('public')->assertMissing($galleryImages->first()->url);

        $this->delete(route('admin.programmes.destroy', $programme))
            ->assertRedirect(route('admin.programmes.index'));
        Storage::disk('public')->assertMissing($programme->image);
        Storage::disk('public')->assertMissing($galleryImages->last()->url);
        $this->assertDatabaseMissing('programmes', ['id' => $programme->id]);
    }

    public function test_editor_can_manage_events_and_search_them(): void
    {
        Storage::fake('public');
        $programme = Programme::factory()->create();
        $payload = [
            'programme_id' => $programme->id,
            'titre' => 'Journée du bien-être',
            'description' => 'Une journée communautaire.',
            'lieu' => 'Douala',
            'date' => '2026-10-10',
            'annee_event' => 2026,
            'image_file' => UploadedFile::fake()->image('journee.jpg', 1200, 800),
            'gallery_images' => [
                UploadedFile::fake()->image('public.jpg'),
                UploadedFile::fake()->image('equipe.jpg'),
            ],
        ];

        $this->actingAs($this->editor)
            ->post(route('admin.evenements.store'), $payload)
            ->assertRedirect(route('admin.evenements.index'));

        $evenement = Evenement::query()->firstOrFail();
        Storage::disk('public')->assertExists($evenement->image);
        $eventGallery = $evenement->images()->pluck('url');
        $this->assertCount(2, $eventGallery);
        $this->get(route('admin.evenements.index', ['q' => 'Douala']))
            ->assertOk()
            ->assertSee('Journée du bien-être')
            ->assertSee(route('event.details', $evenement))
            ->assertSee('Voir');

        $updatePayload = $payload;
        unset($updatePayload['image_file'], $updatePayload['gallery_images']);
        $updatePayload['titre'] = 'Journée ABE';
        $this->put(route('admin.evenements.update', $evenement), $updatePayload)
            ->assertRedirect(route('admin.evenements.index'));
        $this->assertDatabaseHas('evenements', ['titre' => 'Journée ABE']);

        $this->delete(route('admin.evenements.destroy', $evenement));
        Storage::disk('public')->assertMissing($evenement->image);
        $eventGallery->each(fn (string $path) => Storage::disk('public')->assertMissing($path));
        $this->assertDatabaseMissing('evenements', ['id' => $evenement->id]);
    }

    public function test_editor_can_manage_news_and_validation_rejects_invalid_data(): void
    {
        Storage::fake('public');

        $this->actingAs($this->editor)
            ->post(route('admin.actualites.store'), [])
            ->assertSessionHasErrors(['titre', 'contenu', 'date_publication', 'image']);

        $payload = [
            'titre' => 'Nouvelle activité ABE',
            'contenu' => 'Présentation de la nouvelle activité.',
            'date_publication' => '2026-09-02',
            'image_file' => UploadedFile::fake()->image('actualite.jpg', 1200, 800),
            'gallery_images' => [
                UploadedFile::fake()->image('temps-fort.jpg'),
                UploadedFile::fake()->image('beneficiaires.jpg'),
            ],
        ];

        $this->post(route('admin.actualites.store'), $payload)
            ->assertRedirect(route('admin.actualites.index'));

        $actualite = Actualite::query()->firstOrFail();
        Storage::disk('public')->assertExists($actualite->image);
        $newsGallery = $actualite->images()->pluck('url');
        $this->assertCount(2, $newsGallery);
        $this->get(route('admin.actualites.index', ['q' => 'Nouvelle']))
            ->assertOk()
            ->assertSee('Nouvelle activité ABE');

        $updatePayload = $payload;
        unset($updatePayload['image_file'], $updatePayload['gallery_images']);
        $updatePayload['titre'] = 'Activité ABE actualisée';
        $this->put(route('admin.actualites.update', $actualite), $updatePayload);
        $this->assertDatabaseHas('actualites', ['titre' => 'Activité ABE actualisée']);

        $this->delete(route('admin.actualites.destroy', $actualite));
        Storage::disk('public')->assertMissing($actualite->image);
        $newsGallery->each(fn (string $path) => Storage::disk('public')->assertMissing($path));
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

    public function test_editor_can_upload_and_delete_a_media_file(): void
    {
        Storage::fake('public');
        $actualite = Actualite::factory()->create();

        $this->actingAs($this->editor)
            ->post(route('admin.images.store'), [
                'image_file' => UploadedFile::fake()->image('action-abe.jpg', 1200, 800),
                'actualite_id' => $actualite->id,
            ])
            ->assertRedirect(route('admin.images.index'));

        $image = Image::query()->firstOrFail();
        Storage::disk('public')->assertExists($image->url);
        $this->assertStringContainsString('/storage/mediatheque/', $image->image_url);

        $this->delete(route('admin.images.destroy', $image))
            ->assertRedirect(route('admin.images.index'));

        Storage::disk('public')->assertMissing($image->url);
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
