<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminUserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_an_admin_can_access_user_management(): void
    {
        $editor = User::factory()->create();
        $this->actingAs($editor)->get(route('admin.users.index'))->assertForbidden();

        $admin = User::factory()->admin()->create();
        $this->actingAs($admin)->get(route('admin.users.index'))->assertOk();
    }

    public function test_admin_can_create_and_update_an_editor(): void
    {
        $admin = User::factory()->admin()->create();
        $this->actingAs($admin)->post(route('admin.users.store'), [
            'name' => 'Éditrice ABE',
            'email' => 'editor@abe.test',
            'role' => UserRole::Editor->value,
            'password' => 'MotDePasse!2026',
            'password_confirmation' => 'MotDePasse!2026',
        ])->assertRedirect(route('admin.users.index'));

        $editor = User::query()->where('email', 'editor@abe.test')->firstOrFail();
        $this->assertTrue(Hash::check('MotDePasse!2026', $editor->password));

        $this->put(route('admin.users.update', $editor), [
            'name' => 'Responsable éditoriale',
            'email' => 'editor@abe.test',
            'role' => UserRole::Editor->value,
            'password' => '',
            'password_confirmation' => '',
        ])->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseHas('users', ['id' => $editor->id, 'name' => 'Responsable éditoriale']);
        $this->assertTrue(Hash::check('MotDePasse!2026', $editor->fresh()->password));
    }

    public function test_admin_cannot_delete_self_or_demote_the_last_admin(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->delete(route('admin.users.destroy', $admin))
            ->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $admin->id]);

        $this->put(route('admin.users.update', $admin), [
            'name' => $admin->name,
            'email' => $admin->email,
            'role' => UserRole::Editor->value,
            'password' => '',
            'password_confirmation' => '',
        ])->assertSessionHasErrors('role');
        $this->assertTrue($admin->fresh()->isAdmin());
    }

    public function test_only_admin_can_update_site_settings(): void
    {
        $editor = User::factory()->create();
        $this->actingAs($editor)->get(route('admin.settings.edit'))->assertForbidden();

        $admin = User::factory()->admin()->create();
        $this->actingAs($admin)->put(route('admin.settings.update'), [
            'site_name' => 'Association ABE',
            'contact_email' => 'contact@abe.test',
            'contact_phone' => '+237 600 000 000',
            'address' => 'Douala, Cameroun',
        ])->assertRedirect(route('admin.settings.edit'));

        $this->assertDatabaseCount('site_settings', 1);
        $this->assertDatabaseHas('site_settings', [
            'site_name' => 'Association ABE',
            'contact_email' => 'contact@abe.test',
        ]);
    }
}
