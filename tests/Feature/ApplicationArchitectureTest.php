<?php

namespace Tests\Feature;

use App\Http\Requests\ImageRequest;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Programme;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ApplicationArchitectureTest extends TestCase
{
    use RefreshDatabase;

    public function test_root_redirects_to_the_public_site(): void
    {
        $this->get('/')->assertRedirect('/abe');
    }

    public function test_public_detail_routes_use_implicit_model_binding(): void
    {
        $programme = Programme::factory()->create();
        $evenement = Evenement::factory()->create();

        $this->get(route('programme.details', $programme))->assertOk();
        $this->get(route('event.details', $evenement))->assertOk();
        $this->get('/abe/programme/invalide')->assertNotFound();
        $this->get('/abe/event/999999')->assertNotFound();
    }

    public function test_public_collections_are_paginated(): void
    {
        Programme::factory(10)->create();
        Evenement::factory(10)->create();
        Actualite::factory(10)->create();

        $programmes = $this->get(route('programme'))->assertOk()->viewData('programmes');
        $evenements = $this->get(route('event'))->assertOk()->viewData('evenements');
        $actualites = $this->get(route('news'))->assertOk()->viewData('actualites');

        $this->assertInstanceOf(LengthAwarePaginator::class, $programmes);
        $this->assertInstanceOf(LengthAwarePaginator::class, $evenements);
        $this->assertInstanceOf(LengthAwarePaginator::class, $actualites);
        $this->assertSame(9, $programmes->perPage());
        $this->assertSame(9, $evenements->perPage());
        $this->assertSame(9, $actualites->perPage());
    }

    public function test_an_image_requires_exactly_one_owner(): void
    {
        $evenement = Evenement::factory()->create();
        $actualite = Actualite::factory()->create();
        $rules = (new ImageRequest)->rules();

        $withoutOwner = Validator::make(['url' => 'image.jpg'], $rules);
        $withBothOwners = Validator::make([
            'url' => 'image.jpg',
            'evenement_id' => $evenement->id,
            'actualite_id' => $actualite->id,
        ], $rules);
        $withEvent = Validator::make([
            'url' => 'image.jpg',
            'evenement_id' => $evenement->id,
        ], $rules);

        $this->assertTrue($withoutOwner->fails());
        $this->assertTrue($withBothOwners->fails());
        $this->assertFalse($withEvent->fails());
    }

    public function test_unauthenticated_api_requests_return_json_401(): void
    {
        $this->get('/api/user')
            ->assertUnauthorized()
            ->assertExactJson(['message' => 'Unauthenticated.']);
    }
}
