<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $users = User::query()
            ->when($search, fn ($query) => $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            }))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'search'));
    }

    public function create(): View
    {
        return view('admin.users.create', ['roles' => UserRole::cases()]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        User::query()->create($request->validated());

        return to_route('admin.users.index')->with('success', 'Compte créé.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', ['user' => $user, 'roles' => UserRole::cases()]);
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        if ($user->isAdmin() && $data['role'] !== UserRole::Admin->value && $this->isLastAdmin()) {
            throw ValidationException::withMessages(['role' => 'Le dernier administrateur ne peut pas être rétrogradé.']);
        }
        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }
        $user->update($data);

        return to_route('admin.users.index')->with('success', 'Compte mis à jour.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->is($user)) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        if ($user->isAdmin() && $this->isLastAdmin()) {
            return back()->with('error', 'Le dernier administrateur ne peut pas être supprimé.');
        }
        $user->delete();

        return to_route('admin.users.index')->with('success', 'Compte supprimé.');
    }

    private function isLastAdmin(): bool
    {
        return User::query()->where('role', UserRole::Admin->value)->count() <= 1;
    }
}
