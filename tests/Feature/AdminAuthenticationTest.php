<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        RateLimiter::clear('admin@abe.test|127.0.0.1');

        parent::tearDown();
    }

    public function test_guest_is_redirected_to_login_from_admin(): void
    {
        $this->get('/admin')->assertRedirect(route('login'));
        $this->get(route('login'))->assertOk()->assertSee('Administration ABE');
    }

    public function test_admin_can_log_in_and_log_out(): void
    {
        $admin = User::factory()->admin()->create([
            'email' => 'admin@abe.test',
            'password' => 'mot-de-passe',
        ]);

        $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'mot-de-passe',
        ])->assertRedirect(route('admin.home'));

        $this->assertAuthenticatedAs($admin);
        $this->get(route('admin.home'))->assertOk()->assertSee($admin->name);

        $this->post(route('admin.logout'))->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $user = User::factory()->admin()->create(['email' => 'admin@abe.test']);

        $this->from(route('login'))->post(route('admin.login.store'), [
            'email' => $user->email,
            'password' => 'incorrect-password',
        ])->assertRedirect(route('login'))->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_is_rate_limited_after_five_failures(): void
    {
        User::factory()->admin()->create(['email' => 'admin@abe.test']);

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('admin.login.store'), [
                'email' => 'admin@abe.test',
                'password' => 'incorrect-password',
            ]);
        }

        $this->post(route('admin.login.store'), [
            'email' => 'admin@abe.test',
            'password' => 'incorrect-password',
        ])->assertSessionHasErrors('email');

        $this->assertTrue(RateLimiter::tooManyAttempts('admin@abe.test|127.0.0.1', 5));
    }

    public function test_roles_and_policies_enforce_access_boundaries(): void
    {
        $admin = User::factory()->admin()->create();
        $editor = User::factory()->create();
        $programme = Programme::factory()->create();

        $this->assertSame(UserRole::Admin, $admin->role);
        $this->assertSame(UserRole::Editor, $editor->role);
        $this->assertTrue($admin->can('create', User::class));
        $this->assertFalse($editor->can('create', User::class));
        $this->assertTrue($editor->can('update', $programme));
        $this->actingAs($editor)->get(route('admin.home'))->assertOk();
    }

    public function test_authenticated_user_can_change_password_with_current_password(): void
    {
        $user = User::factory()->admin()->create(['password' => 'ancien-secret']);

        $this->actingAs($user)->put(route('admin.password.update'), [
            'current_password' => 'ancien-secret',
            'password' => 'nouveau-secret',
            'password_confirmation' => 'nouveau-secret',
        ])->assertSessionHasNoErrors()->assertSessionHas('status');

        $this->assertTrue(Hash::check('nouveau-secret', $user->fresh()->password));
    }

    public function test_password_change_rejects_an_invalid_current_password(): void
    {
        $user = User::factory()->admin()->create(['password' => 'ancien-secret']);

        $this->actingAs($user)->put(route('admin.password.update'), [
            'current_password' => 'mauvais-secret',
            'password' => 'nouveau-secret',
            'password_confirmation' => 'nouveau-secret',
        ])->assertSessionHasErrors('current_password');

        $this->assertTrue(Hash::check('ancien-secret', $user->fresh()->password));
    }

    public function test_create_admin_command_never_requires_a_stored_default_password(): void
    {
        $this->artisan('abe:create-admin', ['email' => 'owner@abe.test'])
            ->expectsQuestion('Mot de passe (8 caractères minimum)', 'secret-admin')
            ->assertSuccessful();

        $admin = User::query()->where('email', 'owner@abe.test')->firstOrFail();

        $this->assertSame(UserRole::Admin, $admin->role);
        $this->assertTrue(Hash::check('secret-admin', $admin->password));
    }
}
