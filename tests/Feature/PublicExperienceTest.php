<?php

namespace Tests\Feature;

use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Programme;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicExperienceTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_uses_configured_contact_details(): void
    {
        SiteSetting::query()->create([
            'site_name' => 'Association ABE',
            'contact_email' => 'contact@abe.test',
            'contact_phone' => '+237 600 000 000',
            'address' => 'Yaoundé, Cameroun',
        ]);

        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('contact@abe.test')
            ->assertSee('+237 600 000 000')
            ->assertSee('Yaoundé, Cameroun');
    }

    public function test_visitor_can_send_a_contact_message(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Partenaire ABE',
            'email' => 'partenaire@example.test',
            'subject' => 'Proposition de partenariat',
            'message' => 'Nous souhaitons organiser une activité avec votre association.',
            'website' => '',
        ])->assertRedirect(route('contact'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('messages', [
            'user_id' => null,
            'sender_name' => 'Partenaire ABE',
            'sender_email' => 'partenaire@example.test',
            'subject' => 'Proposition de partenariat',
        ]);
    }

    public function test_contact_form_rejects_invalid_and_bot_submissions(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Bot',
            'email' => 'invalid',
            'message' => 'court',
            'website' => 'https://spam.test',
        ])->assertSessionHasErrors(['email', 'message', 'website']);

        $this->assertDatabaseCount('messages', 0);
    }

    public function test_news_detail_displays_managed_content_and_related_images(): void
    {
        $actualite = Actualite::factory()->create([
            'titre' => 'Action communautaire à Yaoundé',
            'contenu' => 'Le contenu complet de notre action communautaire.',
        ]);
        Image::factory()->create([
            'url' => 'https://example.test/action.jpg',
            'actualite_id' => $actualite->id,
        ]);

        $this->get(route('news.details', $actualite))
            ->assertOk()
            ->assertSee('Action communautaire à Yaoundé')
            ->assertSee('Le contenu complet de notre action communautaire.')
            ->assertSee('https://example.test/action.jpg');
    }

    public function test_gallery_displays_managed_images_and_legacy_news_url_is_gone(): void
    {
        $actualite = Actualite::factory()->create();
        Image::factory()->create([
            'url' => 'https://example.test/gallery-managed.jpg',
            'actualite_id' => $actualite->id,
        ]);

        $this->get(route('gallery'))
            ->assertOk()
            ->assertSee('https://example.test/gallery-managed.jpg');
        $this->get('/abe/newsDetail')->assertNotFound();
    }

    public function test_home_displays_managed_content_without_template_placeholders(): void
    {
        Programme::factory()->create(['nom' => 'Programme autonomie']);
        Actualite::factory()->create(['titre' => 'Actualité institutionnelle']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Programme autonomie')
            ->assertSee('Actualité institutionnelle')
            ->assertDontSee('Lorem Ipsum')
            ->assertDontSee('news-details.html');
    }

    public function test_public_responses_include_security_headers(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
    }

    public function test_visitor_can_comment_on_an_event(): void
    {
        $evenement = Evenement::factory()->create();

        $this->post(route('event.comments.store', $evenement), [
            'author_name' => 'Visiteur ABE',
            'contenu' => 'Cette activité est très intéressante.',
            'website' => '',
        ])->assertRedirect(route('event.details', $evenement).'#commentaires')
            ->assertSessionHas('comment_success');

        $this->assertDatabaseHas('commentaires', [
            'evenement_id' => $evenement->id,
            'author_name' => 'Visiteur ABE',
            'contenu' => 'Cette activité est très intéressante.',
        ]);
    }

    public function test_event_comments_are_validated_and_paginated(): void
    {
        $evenement = Evenement::factory()->create();
        Commentaire::factory()->count(7)->for($evenement)->create();

        $this->post(route('event.comments.store', $evenement), [
            'author_name' => 'B',
            'contenu' => 'Non',
            'website' => 'spam.test',
        ])->assertSessionHasErrors(['author_name', 'contenu', 'website']);

        $response = $this->get(route('event.details', $evenement));
        $response->assertOk()->assertSee('Commentaires');
        $this->assertSame(5, $response->viewData('commentaires')->count());
        $this->assertSame(7, $response->viewData('commentaires')->total());
    }

    public function test_health_endpoint_checks_database_connectivity(): void
    {
        $this->getJson(route('health'))
            ->assertOk()
            ->assertExactJson(['status' => 'ok']);
    }
}
